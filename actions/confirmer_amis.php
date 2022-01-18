<?php 
$id = $_GET['id'];
$moi = $_SESSION['id'];

$sql = "UPDATE lien SET etat = 'amis' WHERE idUtilisateur1 = $id AND idUtilisateur2= $moi";
$q = $pdo->query($sql);

header('Location:index.php?action=profile');

?>