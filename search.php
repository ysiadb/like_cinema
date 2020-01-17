<?php

include ("databaseco.php");

  if (isset($_GET["q"]) == "Rechercher")
  {
   $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les failles html
   $terme = $_GET["terme"];
   $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
   $terme = strip_tags($terme); //pour supprimer les balises html dans la requête


  if (isset($terme))
 {
  $terme = strtolower($terme);
  $select_terme = $bdd->prepare("SELECT titre FROM film WHERE titre LIKE ?");
  $select_terme->execute(array("%".$terme."%"));
 }
 else
 {
  $message = "Vous devez entrer votre requête dans la barre de recherche";
 }
  }
?>
  <!DOCTYPE html>
  <html>
  <head>
	<title>My cinema</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/gsh6pdg.css">
    <?php session_start();?>
    <meta charset="UTF-8">
    <?php include ("databaseco.php"); ?>

</head>
   <body>
     <?php
    include("header.php");

    echo "<div><h2>" ."Votre recherche \"" . $terme . "\" a trouvé les resultats suivants : " . "</div></h2>" . PHP_EOL;
    
    while($terme_trouve = $select_terme->fetch())
    {
     echo "<div><h5>". $terme_trouve['titre'] . "</h5></div>" . "\r";
    }
     
     $select_terme->closeCursor();

    if ($terme = null)
    {
       echo "Aucun(s) résultat(s)";
    }

     
     ?>

   </body>
  </html>

<?php
function GetaFilm($type, $Limit = false)
{
    if ($type == "film")
    {
     $request = "SELECT titre, resum, annee_prod, genre.nom as genderName,".
     "distrib.nom AS distribName FROM".
     " film LEFT JOIN genre ON film.id_genre = genre.id_genre ".
     "LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib WHERE";
     $request = $request . $Limit;
    }
      return $request;
}
?>