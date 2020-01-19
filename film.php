
<!DOCTYPE html>

<!-- //=======Annexes=======// -->

<?php include('databaseco.php');

$genre = $bdd->query('SELECT * FROM genre');
$distrib = $bdd->query('SELECT * FROM distrib');
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
        <div class="films">
            <?php $reponse = $bdd->query('SELECT * FROM film');

                while($donnees = $reponse->fetch())
                {
                    echo "<div>" . "<h4><b>". $donnees['titre'] . "</b></h4>". "Sortie : " . $donnees['date_debut_affiche'] . " - ". $donnees['date_fin_affiche']. "<br/>" . "Durée : ". $donnees['duree_min'] . " min" . "<br/>". "Année : " . $donnees['annee_prod'] . "<br/>". "<div id=\"synopsis\">" . "Synopsis : " . $donnees['resum'] . "</div>" . "<br/>" . "<br/>" . "</div>";
                }

            ?>        
        </div>
    </div>

</section>

<?php include('footer.php'); ?>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
