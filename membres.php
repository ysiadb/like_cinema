
<!DOCTYPE html>

<!-- //=======Annexes=======// -->

<?php include('databaseco.php');

$genre = $bdd->query('SELECT * FROM genre');
$distrib = $bdd->query('SELECT * FROM distrib');
$membres = $bdd->query('SELECT * FROM membre INNER JOIN fiche_personne ON membre.id_fiche_perso = fiche_personne.id_perso');

?>

<!-- ======================== -->




<head>
	<title>My cinema</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/gsh6pdg.css">
    <?php session_start();?>
    <meta charset="UTF-8">
    
</head>
<body>
    <?php include('header.php');?>
                
    <section class="main_container">
    
    <?php include ("sidebar.php");?>    
    
    <div class="main">
        
        <div class="main_membre">
            <h3 id="membre_title">Membres</h3>

            <div class="search">

                <form action="search_membre.php" method="get">
                    <input placeholder="Rechercher un membre ..." id="mb-search" name="nom_membre" aria-label="Search through site content">
                    <button method="get" name="m" value="Rechercher">Search</button>
                </form>
            </div>
        </div>

        <div class="membres">
            <?php $reponse = $membres;

                while($donnees = $reponse->fetch())
                {
                    echo "<div background color = \"green\">" . "<b>". $donnees['nom']. " ". $donnees['prenom'] . "</b>" . "<br/>" . "Email : " . $donnees['email'] . "<br/>" . "<br/>" . "</div>";
                }

            ?>     
            
        </div>
    </div>

</section>

<?php include('footer.php'); ?>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
