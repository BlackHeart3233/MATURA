<?php
session_start();

if(!isset($_SESSION["username"])){
    header('Location:http://localhost/Matura/login.php');
}
?>

<html>
    <head>
        <title>Kviz</title>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="kviz_meni.css" >
        <link rel="stylesheet" href="nav_bar.css" >
    </head>
    <body>
    <div id="navbar">
            <a href="/Matura/akcija/logout.php"><img id="logo" class="nav_item"src="/Matura/slike/Lidl-Logo.svg.png"> </a>
            <a href="/Matura/kviz/kviz_meni_1.php" class="nav_item gumb_nav ">Kviz</a>
            <a href="/Matura//plu.php"  class="nav_item gumb_nav ">PLU</a>
            <a href="/Matura/Rezultati.php"  class="nav_item gumb_nav">Rezultati</a>
    </div>
        <div id="srednji">
            <form id="izbira" action="/Matura/kviz/kviz_st_name_2.php" method="GET">
                <label for="3"></label>
                <input class="gumb_nav" type="submit" id="3" name="vrsta" value="Sadje">
                <label for="1"></label>
                <input  class="gumb_nav" type="submit" id="1" name="vrsta" value="Dopeka">
                <label for="2"></label>
                <input class="gumb_nav" type="submit" id="2" name="vrsta" value="Zelenjava">
            </form>
        </div>
