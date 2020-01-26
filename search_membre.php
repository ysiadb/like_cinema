<?php

include ("databaseco.php");


  if (isset($_GET["m"]) == "Rechercher")
  {
   $_GET["nom_membre"] = htmlspecialchars($_GET["nom_membre"]); //pour sécuriser le formulaire contre les failles http
   $nom_membre = $_GET["nom_membre"];
   $nom_membre = trim($nom_membre); //pour supprimer les espaces dans la requête de l'internaute
   $nom_membre = strip_tags($nom_membre); //pour supprimer les balises html dans la requête
  }

  if (isset($nom_membre))
 {
    $nom_membre = strtolower($nom_membre);
    $select_nm = $bdd->prepare('SELECT * FROM fiche_personne WHERE nom LIKE ?');
    $select_nm->execute(array("%".$nom_membre."%"));
 }

 if (isset($nom_membre))
 {
    $nom_membre = strtolower($nom_membre);
    $select_pm = $bdd->prepare('SELECT * FROM fiche_personne WHERE prenom LIKE ?');
    $select_pm->execute(array("%".$nom_membre."%"));
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
    include("header.php");?>

    
<div class="search">
    <form action="search_membre.php" method="get">
        <input placeholder="Rechercher un membre ..." id="mb-search" name="nom_membre" aria-label="Search through site content">
        <button method="get" name="m" value="Rechercher">Search</button>
    </form>
</div>
<?php echo "<div><h2>" ."Votre recherche \"" . $nom_membre . "\" a trouvé les résultats suivants : " . "</div></h2>" . "<br/>" . "<br/>" ?>

    <div class="membres">

        <?php

while($nom_membre_trouve = $select_nm->fetch())
{
    echo "<div>" . "<h4><b><a href=\"fiche_membre.php?membre=". $nom_membre_trouve['id_perso']. "\">". $nom_membre_trouve['nom'] . " " . $nom_membre_trouve['prenom'] . "</a></b></h4>". "Email : " . $nom_membre_trouve['email'] . "<br/>" . "<br/>" . "</div>";
}

$select_nm->closeCursor();

if ($nom_membre_trouve = $select_pm->fetch())
{
    echo "<div>" . "<h4><b><a href=\"fiche_membre.php?membre=". $nom_membre_trouve['id_perso']. "\">". $nom_membre_trouve['nom'] . " " . $nom_membre_trouve['prenom'] . "</a></b></h4>". "Email : " . $nom_membre_trouve['email'] . "<br/>" . "<br/>" . "</div>";
}


?>
</div>

    </div>
   <?php include('footer.php'); ?>
   
   </body>
   
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  </html>
