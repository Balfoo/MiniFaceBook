<?php

$id1 = $_SESSION['id'];
$id2 = $_POST['id'];
$sql="INSERT INTO lien VALUES(NULL,'$id1','$id2','attente')";
$q = $pdo->prepare($sql);
$q->execute();

header('Location:index.php?action=profile');


?>