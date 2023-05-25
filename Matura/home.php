<?php
    session_start();


    if(!isset($_SESSION['username'])){
        header('Location:http://localhost/Matura/login.php');
    }
?>

<html>
    <head>
            <meta charset="UTF-8"/> 
            <title>Home</title>
            <link rel="stylesheet" type="text/css" href="home.css"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="nav_bar.css" >
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    </head>
    <body>
    <div id="navbar">
            <a href="/Matura/akcija/logout.php"><img id="logo" class="nav_item"src="slike/Lidl-Logo.svg.png"> </a>
            <a href="/Matura/kviz/kviz_meni_1.php" class="nav_item gumb_nav ">Kviz</a>
            <a href="/Matura//plu.php"  class="nav_item gumb_nav ">PLU</a>
            <a href="/Matura/Rezultati.php"  class="nav_item gumb_nav">Rezultati</a>
        </div>
        <div id="middle">
            <div id="Uvod"> <a href="/Matura/plu.php">ZAČNE SE Z VAMI</a></div>
        </div>
    </body>
</html>