<!doctype html>
<html lang="fr">
<?php
session_start();

include "php/dbconnect.php";
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Titre -->
    <title>EXO JSON</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- CDN -->

    <!-- My link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Logo -->
    <link rel="icon" type="image/png" href="" sizes="16x16">
</head>



<body>
    <form action="" method="POST">
            <legend>Veuillez sélectionner vos choix :</legend>
            <label for="menu">Choisisez votre sandwich :</label>
            
            <select name="menu" id="menu">
                <option value=""> Choisisez une option </option>
                <option value="steak">Americain Steak</option>
                <option value="fricadelle">Americain Fricadelle</option>
                <option value="merguez">Americain Merguez</option>
                <option value="tanguy">Americain Tanguy</option>
                <option value="mcdo">Croque McDo</option>
            </select>

            <div>
                <input type="radio" id="sans_sauce" name="sauce" checked>
                <label for="sans_sauce">Sans Sauce</label>
            </div>

            <div>
                <input type="radio" id="mayo" name="sauce">
                <label for="mayo">Mayo</label>
            </div>

            <div>
                <input type="radio" id="ketchup" name="sauce">
                <label for="ketchup">Ketchup</label>
            </div>

            <div>
                <input type="radio" id="poivre" name="sauce">
                <label for="poivre">Poivre</label>
            </div>

            <div>
                <center><input type="submit" name="submit" id="submit" value="Envoy....AIENTTTTTT"/></center>
            </div>
        <form>
<?php

if(isset($_POST['submit'])){

    $menu = !empty($_POST['menu']) ? $_POST['menu'] : NULL;
    $sauce = !empty($_POST['sauce']) ? $_POST['sauce'] : NULL;

    $arr = array('menu' => $menu, 'sauce' => $sauce);

    $infos = json_encode($arr);

    try {
    $query = "INSERT INTO commandes (infos_commande) VALUES (?)";
    $result = $db->prepare($query);
    $result->execute([$infos]);
    } catch (PDOException $e) {          echo "Error : " . $e->getMessage();      }
    }
    ?>        
</body>