<?php
if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}
// On veut affchier notre mur ou celui d'un de nos amis et pas faire n'importe quoi
$ok = false;

if((!isset($_GET["id"]) || $_GET["id"]==$_SESSION["id"])){
    $id = $_SESSION["id"];
    $ok = true; // On a le droit d afficher notre mur

    // Test CODE
    // Ici je suis sur mon profil
    $sql = "SELECT user.id AS 'envoyeur', login FROM lien 
            INNER JOIN user ON user.id = idUtilisateur1
            WHERE etat = 'attente' AND idUtilisateur2 = $id
            ";
    $q = $pdo->query($sql);

    $demande_amis = $q->fetchAll(PDO::FETCH_OBJ);
    
    // Mes amis
$q = $pdo->query("SELECT auteur.id AS 'idauteur', auteur.login AS 'demandeur', ami.login AS 'ami', auteur.genre AS 'demandeurgenre', ami.genre AS 'amigenre' FROM lien
JOIN user auteur ON auteur.id = lien.idUtilisateur1
JOIN user ami ON ami.id = lien.idUtilisateur2
WHERE (lien.idUtilisateur1 = $id OR lien.idUtilisateur2 = $id) AND etat = 'amis'
");

$mesamis = $q->fetchAll(PDO::FETCH_OBJ);


} else {
    $id = $_GET["id"];
    // Verifions si on est amis avec cette personne
    $sql = "SELECT * FROM lien WHERE etat='amis'
            AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
    $q = $pdo -> prepare($sql);
    $q->execute(array($id,$_SESSION["id"],$_SESSION["id"], $id));
    $line = $q->fetch();

    if(isset($line['etat']) && $line['etat'] =='amis'){
        $etat = $line['etat']; 
        $ok = true;
    }elseif(isset($line['etat']) && $line['etat'] == 'attente'){
        $etat = $line['etat'];
        $ok = false;
    }elseif(isset($line['etat']) && $line['etat'] == 'bloque'){
        $etat = $line['etat'];
        $ok = false;
    } else{
        $etat = false;
    }
}
if($ok==false) {
    $sql= "SELECT * FROM user WHERE id=?";
    $q = $pdo -> prepare($sql);
    $q -> execute(array($id));
    $line = $q-> fetch();
    $user = $line;
    echo $blade->make("ajoutamis", ["user"=> $user, "etat" => $etat, "id" => $id]);
    // Récupérer la personne qui a l id $_GET["id"] (nommée $user
    // Cette vue demande à faire l amitié
            echo "pas amis";  
} else {
    $postes = array();
    $sql="SELECT login,genre,id FROM user WHERE id=?";
    $q =$pdo->prepare($sql);
    $q -> execute(array($id));
    $line = $q->fetch();
    $user = $line;

    
    // $sql = "SELECT DISTINCT ecrit.id, login, contenu, dateEcrit, m1.idUtilisateur2, m2.idUtilisateur1 FROM ecrit
    //         INNER JOIN user ON ecrit.idAuteur = user.id 
    //         INNER JOIN lien AS M1 ON m1.idUtilisateur1 = user.id
    //         INNER JOIN lien AS M2 ON m2.idUtilisateur2 = user.id
    //         WHERE idAuteur= :moi
    //         ORDER BY ecrit.dateEcrit DESC";

    $sql = "SELECT * FROM ecrit 
            INNER JOIN user ON ecrit.idAuteur = user.id 
            WHERE idAuteur=? OR idAmi=? 
            ORDER BY dateEcrit DESC";
            
    $q = $pdo->prepare($sql);
    $q->execute([$id, $id]);

    while($line = $q->fetch()){
        $postes[]= $line;
    }

    echo $blade->make("filsacc", ["postes"=> $postes, "user" => $user, "mesamis"=> $mesamis])-> render();
// A completer
// Requête de sélection des éléments dun mur
 // SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC
 // le paramètre  est le $id
 // Rendre la vue appropriée
}
?>
