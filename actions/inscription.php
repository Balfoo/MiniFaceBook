<?php
if (isset($_POST["login"], $_POST["mdp"], $_POST["email"])) { //On verifie que l'utilisateur a bien renseiger tout les champs

    //on vérifie si ce compte n'existe pas déja (login ou email identique)
    $sql = "SELECT * FROM user WHERE login=? AND email=?";

    $q = $pdo->prepare($sql);
    $q->execute([$_POST["login"], $_POST["email"]]);
    $user = $q->fetch(); //$user = variable temporaire qui prend tt les utilisateurs de la bdd un à un.

    if($user['login'] == $_POST["login"] OR  $user['email'] == $_POST["email"]) { //Si on a un même login ou email
        header("Location:index.php"); //On retourne à l'accueil.
        
    } else {
        $sql = "INSERT INTO user VALUE(NULL, ?, PASSWORD(?),?,NULL,NULL);"; //On renseigne les champs
                                //ID, login, mdp, email, remember, avatar.
                                //(ID NULL = va en donner un automatiquement ; ? = attend qu'on le donne nous)
                                //PASSWORD(?) pement de dire à phpmyadmin que c'est un mdp = il va le chifrer.
    $q = $pdo->prepare($sql);
    $q->execute([$_POST["login"], $_POST["mdp"], $_POST["email"]]);

    //Quand le compte est créer, on connecte directement l'utilisateur.
    $_SESSION['id'] = $pdo->lastInsertId(); //L'id = le dernier id créé dans la base de donnée.
    $_SESSION['login'] = $_POST["login"];

    header("Location:index.php");
    }

} else { //Si l'utilisateur n'a pas renseigné tout les champs
    header("Location:index.php"); //On retourne à l'accueil.
}

?>