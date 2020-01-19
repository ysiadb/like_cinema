<?php

include ("databaseco.php");

  if (isset($_GET["q"]) == "Rechercher")
  {
   $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les failles http
   $terme = $_GET["terme"];
   $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
   $terme = strip_tags($terme); //pour supprimer les balises html dans la requête


  if (isset($terme))
 {
  $terme = strtolower($terme);
  $select_terme = $bdd->prepare("SELECT titre, resum, date_debut_affiche, date_fin_affiche, duree_min , id_genre FROM film WHERE titre LIKE ?");
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
    
    echo "<div><h2>" ."Votre recherche \"" . $terme . "\" a trouvé les résultats suivants : " . "</div></h2>" . "<br/>" . "<br/>" ?>

    <div class="films">
    
    <?php
    while($terme_trouve = $select_terme->fetch())
    {
     echo "<div>" . "<h4><b>". $terme_trouve['titre'] . "</b></h4>". "Sortie : " . $terme_trouve['date_debut_affiche'] . " - ". $terme_trouve['date_fin_affiche']. "<br/>" . "Durée : ". $terme_trouve['duree_min'] . " min" . "<br/>". "Année : " . $terme_trouve['annee_prod'] . "<br/>". "<div id=\"synopsis\">" . "Synopsis : " . $terme_trouve['resum'] . "</div>" . "<br/>" . "<br/>" . "</div>";
    }
    
    // if ($_GET['genre'] != "Default") 
    // {
    //   $terme_trouve .= ' && id_genre="' . $_GET['genre'] . '"';
    // }
    
    // if ($_GET['distrib'] != "Default") 
    // {
    //   $terme_trouve .= ' && id_distrib ="' . $_GET['distrib'] . '"';
    // }
    
    $select_terme->closeCursor();
     ?>

    </div>
   <?php include('footer.php'); ?>
   
   </body>
   
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  </html>
