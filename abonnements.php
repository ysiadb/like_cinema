
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
        
        <!-- <section class="container"> -->
            <div class="container choices">    
        <div class="main">
            <h4 id="abonnement_title">Abonnements</h4>
        <div class="abo">
            <?php $reponse = $bdd->query('SELECT nom, resum, prix, duree_abo  FROM abonnement');

                while($donnees = $reponse->fetch())
                {
                    print_r("<div>" ."<h4>" . $donnees["nom"] . "</h4>" . "<br/>" . $donnees["resum"]. "<br/>" . $donnees["prix"] . " €" . "<br/>". $donnees["duree_abo"] . " jour(s)" . "<br/>" . "<br/>" . "</div>");
                }

            ?>        
        </div>
    </div>




</section>

<?php include('footer.php'); ?>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
