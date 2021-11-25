<?php //Pas besoin d'affichage (de layout) à cette action, on vérifie juste l'id/mdp.

$sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";

if (isset($_POST["login"], $_POST["mdp"])) { //Si il y a bien un mdp et un id renseigné
        $q = $pdo->prepare($sql); // Etape 1  : preparation
    $q->execute([$_POST["login"], $_POST["mdp"]]); // Etape 2 : execution : 2 paramètres dans la requêtes !!
    $user = $q->fetch();// Etape 3 : ici le login est unique, donc on sait que l'on peut avoir zero ou une  seule ligne.
                        // un seul fetch
    if($user == false) {
        header('Location:index.php?action=login'); //Si l'id/mdp est faux, on redirige vers la page de connexion.
    } else {  //Sinon on se connecte
        $_SESSION['id'] = $user['id']; //On met l'id de l'utilisateur dans une session
        $_SESSION ['login'] = $user['login']; //On met le login de l'utilisateur dans une session.

        if (isset($_POST["resterco"]) == true) { //Si l'utilisateur à coché "rester connecté"
            $unique = sha1(uniqid()); //Créer un id aléatoirement chiffré en sha1.
            setcookie("rememberme", $unique, time()+3600*24*30); //On créer un cookie
            $sql = 'update user set remember=? where id=?'; //On ajoute cette id à l'utilisateur dans la bdd.
            $q = $pdo->prepare($sql);
            $q->execute([$unique, $user["id"]]);
        }

        }

        header('Location:index.php?action=index');//On redirige vers l'accueil.
    }

    else {
        header('Location:index.php?action=login'); //Si pas d'id/mdp, on redirige vers la page de connexion.
    }

echo $blade->make("connexion")->render();
?>