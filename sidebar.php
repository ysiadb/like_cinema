<?php include ("databaseco.php"); ?>

<div class="sidebar">
    <form action="search.php" method="get">
        <h3>Recherche</h3>
        <div class="search">
            <div class="search_byfilter">
                <h4>par filtre</h4>
                 <input placeholder="Rechercher un film ..." id="site-search" name="terme" aria-label="Search through site content">
    
                <select name="genre">
                    <option selected>Genre</option>
                        <?php
                        while($result = $genre->fetch())
                        {
                            echo "<option value=".$result['id_genre'].">".$result['nom']."</option>";
                        }
                        ?>
                </select>

                <select name="distrib">
                    <option selected>Distribution</option> 
                        <?php
                            while($result = $distrib->fetch())
                            {
                                echo "<option value=".$result['id_distrib'].">".$result['nom']."</option>";
                            }
                        ?>
                </select>
                <div class="search_sidebar_button">
                    <button name="q" value="Rechercher">Search</button>
                 </div>
                </div>
                <h4>ou</h4>
                 <div class="tonight">
                    <a href="tonight.php">Quels films passent ce soir ?</a>
                 </div>
            </div>
    </form>
</div>  

