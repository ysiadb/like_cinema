<?php

include ("databaseco.php");
$abonnemt = $bdd->query('SELECT * FROM abonnement');


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

    
    <div class="membres">

        <?php

// while($nom_membre_trouve = $select_nm->fetch())
// {
//     echo "<div>" . "<h4><b><a href=\"\">". $nom_membre_trouve['nom'] . " " . $nom_membre_trouve['prenom'] . "</a></b></h4>". "Email : " . $nom_membre_trouve['email'] . "<br/>" . "<br/>" . "</div>";
// }

// $select_nm->closeCursor();

// if ($nom_membre_trouve = $select_pm->fetch())
// {
//     echo "<div>" . "<h4><b><a href=\"fiche_membre.php\">". $nom_membre_trouve['nom'] . " " . $nom_membre_trouve['prenom'] . "</a></b></h4>". "Email : " . $nom_membre_trouve['email'] . "<br/>" . "<br/>" . "</div>";
// }




//===============Affichage de l historique===============

$ficheperso = $bdd->query('SELECT * FROM membre INNER JOIN fiche_personne ON membre.id_fiche_perso = fiche_personne.id_perso WHERE membre.id_fiche_perso = 45' );

        while($donnees = $ficheperso->fetch())
        {
            echo "<div class=\"ficheperso\">" . "<h4><b>". $donnees['nom']. " " . $donnees['prenom']  . "</b></h4>". "Email : " . $donnees['email'] . "<br/>" . "Date de naissance : ". $donnees['date_naissance']. "<br/>" . "Adresse : ". $donnees['adresse'] . " " . $donnees['cpostal']. " " . $donnees['ville']. " ". $donnees['pays']. " " . "<br/>". "<br/>". "</div>" . "<br/>" . "<br/>";
        }

$abonnement = $bdd->query('SELECT * FROM membre LEFT JOIN abonnement ON membre.id_abo = abonnement.id_abo WHERE membre.id_fiche_perso = 45');

        while($donnees = $abonnement->fetch())
        {
            echo "<div class=\"abonnements\">" . "<h4><b>". "Abonnement"  . "</b></h4>". "<br/>". " Date abonnement : " . $donnees['date_abo']. " " . "<br/>" . "Abonnement choisi : " .$donnees['nom']. " " . "<br/>" . "Conditions : " . $donnees['resum'] . "<br/>" . "Durée : ". $donnees['duree_abo']. " jours".  " " . "<br/>". "<br/>". "</div>" . "<br/>" . "<br/>";
        }



?>
    <select name="abo">
        <option selected>Abonnement</option>
        <?php
            while($result = $abonnemt->fetch())
            {
                echo "<option value=".$result['id_abo'].">".$result['nom']."</option>";
            }
            ?>
    </select>
    <div class="search_sidebar_button">
        <button action="changeAbo()" name="c" value="change">Change</button>
    </div>
</div>


<?php
  if (isset($_GET["c"]) == "change")
  {
    $abo = $_GET["abo"];
  }


  if (isset($_GET['abo']) && $_GET['abo'] === "Abonnement")
  {
   $abo = $_GET['abo'];
   $select_abo = $bdd->prepare('SELECT * FROM abonnement');
   $select_terme->execute(array("%".$abo."%"));
  }

$historique = $bdd->query('SELECT * FROM historique_membre INNER JOIN membre ON membre.id_membre = historique_membre.id_membre 
                            INNER JOIN fiche_personne ON fiche_personne.id_perso = membre.id_fiche_perso 
                            INNER JOIN film ON film.id_film = historique_membre.id_film WHERE membre.id_fiche_perso = 45' );

        while($donnees = $historique->fetch())
        {
            echo "<div class=\"films\">" . "<h4><b>". $donnees['titre'] . "</b></h4>". "Sortie : " . $donnees['date_debut_affiche'] . " - ". $donnees['date_fin_affiche']. "<br/>" . "Durée : ". $donnees['duree_min'] . " min" . "<br/>". "Année : " . $donnees['annee_prod'] . "<br/>". "<div id=\"synopsis\">" . "Synopsis : " . $donnees['resum'] . "</div>" . "<br/>" . "<br/>" . "</div>";
        }


function changeAbo ()
{
    if(isset($_POST['id']) AND isset($_POST['id_abos']))
    {
        global $bdd;
    
        $req = $bdd->prepare('UPDATE membre SET id_abo = :id_abos WHERE id_membre = :id');
    
        $req->bindValue(':id_abos', $_POST['id_abos']);
        $req->bindValue(':id', $_POST['id']);
    
        $req->execute();
    }
}   
    function add()
{
	global $bdd;

	$req = $bdd->prepare('INSERT INTO abonnement (\'nom\') VALUES(:add)');

	$req->bindValue(':add', $_POST['ajouter']);

	$req->execute();
}

?>
</div>

    </div>
   <?php include('footer.php'); ?>
   
   </body>
   
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  </html>
