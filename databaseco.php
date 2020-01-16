<?php

// try{
//     $user = 'root';
//     $password = "HelloRoot";
//     $bdd = "cinema";
    
//     $pdo = new PDO(
//         'mysql:host=localhost;dbname='.$bdd,
//         $user,
//         $password
//     );

//     // Requete Bdd pour la liste des salles et leurs étage
//     $qpdo = 'SELECT nom_salle AS nom, etage_salle AS etage FROM tp_salle';

//     foreach($pdo->query($qpdo) as $row){
//         //  echo $row["nom"] . ' -> Etage : ' . $row["etage"] . PHP_EOL;
//         // var_dump($row);     
//         echo $row["nom"]. ' -> etage : ' . $row["etage"] . PHP_EOL;
//     }

// }
// catch(PDOException $error){
//     echo 'Error : ' . $error->getMessage() . PHP_EOL;
// }
	try
    {
       $bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', 'HelloRoot');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
