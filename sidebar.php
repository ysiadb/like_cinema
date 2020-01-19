<?php include ("databaseco.php"); ?>

<div class="sidebar">
    <form action="search.php" method="get">
        <h3>Recherche</h3>
        <?php
        
    if ($_GET['genre'] != "Default") 
 {
     $terme_trouve .= ' && id_genre="' . $_GET['genre'] . '"';
 }
 
 if ($_GET['distrib'] != "Default") 
 {
     $terme_trouve .= ' && id_distrib ="' . $_GET['distrib'] . '"';
 }
 
 ?>
        <div class="search">
            <div class="search_byfilter">
                <h4>par filtre</h4>
                 <input placeholder="Rechercher un film ..." id="site-search" name="terme" aria-label="Search through site content">
    
                <select action ="search.php" method="get" id="genre">
                    <option value="null">Genre</option>
                        <?php
                        while($result = $genre->fetch())
                        {
                            echo "<option value=".$result['id_genre'].">".$result['nom']."</option>";
                        }
                        ?>
                </select>

                <select action ="search.php" method="get"  id="distrib">
                    <option value="null" selected>Distribution</option> 
                        <?php
                            while($result = $distrib->fetch())
                            {
                                echo "<option value=".$result['id_distrib'].">".$result['nom']."</option>";
                            }
                        ?>
                </select>
                <div class="search_sidebar_button">
                    <button method="get" name="q" value="Rechercher">Search</button>
                 </div>
                </div>
                <h4>ou</h4>
                 <div class="tonight">
                    <a href="tonight.php">Quels films passent ce soir ?</a>
                 </div>
            </div>
    </form>
</div>  





<!-- ('SELECT film.titre, distrib.nom, film.id_distrib, distrib.id_distrib FROM film INNER JOIN distrib ON film.id_distrib = distrib.id_distrib ORDER BY titre LIMIT 50') -->