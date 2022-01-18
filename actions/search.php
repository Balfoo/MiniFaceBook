<?php

try
{
 $sql = new PDO("mysql:host=localhost;dbname=minifb", "root", "");
 $sql ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  die("Une érreur a été trouvé : " . $e->getMessage());
}
$sql->query("SET NAMES UTF8");

if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher")
{
 $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les failles html
 $terme = $_GET['terme'];
 $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
 $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
}
if (isset($terme))
{
 $terme = strtolower($terme);
 $select_terme = $sql->prepare("SELECT id,login FROM user WHERE login LIKE ?");
 $select_terme->execute(array("%".$terme."%"));
}
else
{
 $message = "Vous devez entrer votre requete dans la barre de recherche";
}
?>

<?php
  while($terme_trouve = $select_terme->fetch())
  {
   echo "<div><a href='index.php?action=profile&id=" . 
        $terme_trouve['id'] . 
        "'>".
        $terme_trouve['login'].
        "</a>";
  }
  $select_terme->closeCursor();
?>