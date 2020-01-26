
<!DOCTYPE html>

<!-- //=======Annexes=======// -->

<?php include('databaseco.php');

$genre = $bdd->query('SELECT * FROM genre');
$distrib = $bdd->query('SELECT * FROM distrib');

$filmsParPage = 12;
$filmsTotalReq = $bdd->query('SELECT * FROM film');
$filmsTotal = $filmsTotalReq->rowCount();
$pagesTotales = ceil($filmsTotal/$filmsParPage);

if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
 } else {
    $pageCourante = 1;
 }
 $depart = ($pageCourante-1)*$filmsParPage;



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
                <hr>
                <h1 id="a_laffiche">✌ . A l'affiche . ✌</h1>
                <hr>

              <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">
                    <div class="carousel-item row no-gutters active">
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/1.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/2.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/3.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/4.jpg"></div>
                        
                    </div>
                    <div class="carousel-item row no-gutters">
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/1.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/2.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/3.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/4.jpg"></div>
                        
                    </div>
                </div>
                <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <hr>
            <hr>

            <!-- </div> -->
        <!-- </section> -->

    
    
    <div class="main">
        <section>
            <h1 id="a_laffiche"> . FILMS . </h1>
            <hr>

        </section>
    <div class="films">
            <?php $reponse = $bdd->query('SELECT * FROM film LEFT JOIN genre ON film.id_genre = genre.id_genre LIMIT '.$depart.','.$filmsParPage);

                while($donnees = $reponse->fetch())
                {
                    echo "<div>" . "<h4><b>". $donnees['titre'] . "</b></h4>". "Genre : " . $donnees['nom'] . "<br/>" . "Distribution : " . $donnees['id_distrib'] . "<br/>"."Sortie : " . $donnees['date_debut_affiche'] . " - ". $donnees['date_fin_affiche']. "<br/>" . "Durée : ". $donnees['duree_min'] . " min" . "<br/>". "Année : " . $donnees['annee_prod'] . "<br/>". "<div id=\"synopsis\">" . "Synopsis : " . $donnees['resum'] . "</div>" . "<br/>" . "<br/>" . "</div>";
                }

            ?>   
            
        </div>
        <?php
        for($i=1;$i<=$pagesTotales;$i++) 
        {
         if($i == $pageCourante) 
         {
            echo $i.' ';
         } 
         else 
         {
            echo '<a href="film.php?page='.$i.'">'.$i.'</a> ';
         }
        }
      ?>     
    </div>
    </div>

</section>

<?php include('footer.php'); ?>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>