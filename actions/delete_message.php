<?php
var_dump($_GET);
$id_el = $_GET['id'];
$pdo->query("DELETE  FROM ecrit  WHERE id= $id_el"); 
header("Location:index.php?action=filsacc");
exit();
?>