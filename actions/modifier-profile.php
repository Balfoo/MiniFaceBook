<?php 

$sql = "UPDATE user SET (NULL,?,?,?,NULL,NULL,?,?)"; 
    $q = $pdo->query($sql);
    $q->execute([$_POST["login"], $_POST["mdp"], $_POST["email"],$_POST["genre"],$_POST["description"]]);
    header("Location:index.php");
    
?>