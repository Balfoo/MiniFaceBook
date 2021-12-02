<?php

$bdd->query("SET NAMES UTF8");

if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher"){
 $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
 $terme = $_GET["terme'];
 $terme = trim($terme);
 $terme = strip_tags($terme);
}

 if (isset($terme)){
  $terme = strtolower($terme);
  $select_terme = $bdd->prepare("SELECT titre, contenu FROM articles WHERE titre LIKE ? OR contenu LIKE ?");
  $select_terme->execute(array("%".$terme."%", "%".$terme."%"));
 }
 else
 {
  $message = "Vous devez entrer votre requete dans la barre de recherche";
 }
}
?>
