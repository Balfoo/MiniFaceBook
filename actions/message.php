<?php
if(isset($_POST["titre"], $_POST["contenu"], $_POST["dateEcrit"],$_POST["image"],$_POST["idAuteur"],$_POST["idAmi"])) {
    $sql = "INSERT INTO ecrit VALUE(NULL, ?, CONTENU(?),?,NULL,NULL);"; 
    $q = $pdo->prepare($sql);
    $q->execute([$_POST["titre"], $_POST["contenu"], $_POST["dateEcrit"],$_POST["image"],$_POST["idAuteur"],$_POST["idAmi"]]);
    
    $_SESSION['id'] = $pdo->lastInsertId(); 
    $_SESSION['login'] = $_POST["login"];

    header("Location:index.php");
}
?>
