<?php
	try
    {
       $bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', 'HelloRoot');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
