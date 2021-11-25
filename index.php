<?php
include("config/bd.php");
include("config/actions.php");
include("config/blade.php");


session_start();
if(isset($_SESSION['id']) == false AND isset($_COOKIE['rememberme'])) { //verifie qu'il n'y a pas un cookie de co. Si oui, on connecte l'utilisateur.
    $sql = "SELECT * FROM user where remember=?"; //requête
    $q = $pdo->prepare($sql); //Préparation de la requête
    $q->execute([$_COOKIE['rememberme']]); //Q prend la valeur du cookie rememberme avec l'id aléatoire.
    $user = $q->fetch(); //On parcours les id remberme de la bdd
    if($user != false) { //Si un utilisateur à l'id aléatoire dans le cookie = à celui dans la bdd, on le connecte.
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
    }

}

ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées


?>

<?php
if (isset($_SESSION['info'])) {
    echo "<div>
          <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
    unset($_SESSION['info']);
}
?>


<?php
// Quelle est l'action à faire ?
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "login";
}


// Est ce que cette action existe dans la liste des actions
if (array_key_exists($action, $listeDesActions) == false) {
    echo $blade->make('errors.404')->render();
} else {
    include($listeDesActions[$action]); // Oui, on la charge
}

if(isset($_SESSION['info']))
    unset($_SESSION['info']);

ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
?>


