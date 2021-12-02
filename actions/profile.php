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
} else {
    $id = $_GET["id"];
    // Verifions si on est amis avec cette personne
    $sql = "SELECT * FROM lien WHERE etat='ami'
            AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
    $q = $pdo -> prepare($sql);
    $q->execute(arrat($id,$_SESSION["id"],$_SESSION["id"], $id));
    $line = $q->fetch();

    if(isset($line['etat']) && $line['etat'] ==='amis'){
        $ok = true;
    }
    // les deux ids à tester sont : $_GET["id"] et $_SESSION["id"]
    // A completer. Il faut récupérer une ligne, si il y en a pas ca veut dire que lon est pas ami avec cette personne
}
if($ok==false) {
    // Récupérer la personne qui a l id $_GET["id"] (nommée $user
    // Cette vue demande à faire l amitié
            echo "pas amis";  
} else {
    $postes = array();
    $sql="SELECT login FROM user WHERE id=?";
    $q =$pdo->prepare($sql);
    $q -> execute(array($id));
    $line = $q->fetch();
    $user = $line;

    $sql = "SELECT * FROM ecrit WHERE idAuteur=? OR idAmi=? order by dateEcrit DESC";
    $q =$pdo->prepare($sql);
    $q -> execute(array($id, $id));
    while($line = $q->fetch()){
        $postes[]= $line;
    }
    echo $blade->make("profile", ["postes"=> $postes, "user" => $user[0]])-> render();
// A completer
// Requête de sélection des éléments dun mur
 // SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC
 // le paramètre  est le $id
 // Rendre la vue appropriée
}
?>