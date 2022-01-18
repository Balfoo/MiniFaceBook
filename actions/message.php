<?php
    $idAuteur = $_SESSION['id'];
    date_default_timezone_set('Europe/Paris');
    $dateEcrit = date("Y-m-d H:i:s");
    $q = $pdo -> prepare("INSERT INTO ecrit VALUES (id,'titre',?,?, NULL,?,2)");
    $q->execute([ $_POST["contenu"], $dateEcrit, $idAuteur]);

    header("Location:index.php?action=filsacc");
?>