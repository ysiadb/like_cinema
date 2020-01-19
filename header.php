<?php include('databaseco.php')?>
<header>
        <div class="main_menu">
            <nav class="main_menu_sub" >
                <ul class="main_menu_1">
                    <li><a href="">Séances</a></li>
                    <li><a href="film.php">Films</a></li>
                    <li><a href="abonnements.php">Abonnements</a></li>
                    <li><a href="">Membres</a></li>
                </ul>
                <div class="logo">
                  <a href="index.php"><img src="chaplin.jpg" alt="dessin-logo">
                  <h1>My cinema</h1>
                  </a>
                </div>
                <ul class="main_menu_2">
                  <div class="search">
                    <form action="search.php" method="get">
                      <input placeholder="Rechercher un film ..." id="site-search" name="terme" aria-label="Search through site content">
                      
                      <button method="get" name="q" value="Rechercher">Search</button>
                    </form>
                  </div>
                  <li><a href="login.php">Mon espace</a></li>
                </ul>
            </div>
        </nav>
    </header>
