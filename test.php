<DOCTYPE html>

<?php include ('databaseco.php') ?>

<html>
    <body>
        
        
        <?php $reponse = $bdd->query('SELECT nom_salle  FROM salle');

while($donnees = $reponse->fetch())
{
    echo $donnees["nom_salle"] . "<br/>";
}

?>

    </body>
</html>