
<!DOCTYPE html>
<?php include('databaseco.php')?>
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
    
    <section>
        <section class="container">
            <div class="container choices">

              <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">
                    <div class="carousel-item row no-gutters active">
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/1.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/2.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/3.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/1.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/3.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/1.jpg"></div>
                    </div>
                    <div class="carousel-item row no-gutters">
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/1.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/2.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/3.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/1.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/3.jpg"></div>
                        <div class="col-3 float-left"><img class="img-fluid" src="Affiches/1.jpg"></div>
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
            </div>
        </section>
    </section>

    <?php $reponse = $bdd->query('SELECT nom_salle  FROM salle');

    while($donnees = $reponse->fetch())
    {
        echo $donnees["nom_salle"] . "<br/>";
    }

    ?>

<footer>
  <section class="main_menu_sub">
    
  </section>
</footer>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
