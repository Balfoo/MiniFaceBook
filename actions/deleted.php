<?php
$id = $_GET['id'];
$moi = $_SESSION['id'];
$sql= "DELETE FROM lien WHERE idUtilisateur1 = $id AND idUtilisateur2= $moi";
$q = $pdo->query($sql);

header('Location:index.php?action=profile');
?>