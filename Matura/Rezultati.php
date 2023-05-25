<?php
session_start();
if(!isset($_SESSION["username"])){
    header('Location:http://localhost/Matura/login.php');
}
?>

<html>
<head>
        <title>Rezultati</title>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="nav_bar.css" >
        <link rel="stylesheet" href="Rezultati.css" >
    </head>
    <body>
        <div id="navbar">
            <a href="/Matura/akcija/logout.php"><img id="logo" class="nav_item"src="slike/Lidl-Logo.svg.png"> </a>
            <a href="/Matura/kviz/kviz_meni_1.php" class="nav_item gumb_nav ">Kviz</a>
            <a href="/Matura//plu.php"  class="nav_item gumb_nav ">PLU</a>
            <a href="/Matura/Rezultati.php"  class="nav_item gumb_nav">Rezultati</a>
        </div>
        <div id= "tabela">
            <table>
                <tr>
                    <th> Datum </th>
                    <th> Pravilni </th>
                    <th>Vse moznosti </th>
                </tr>
                <?php 
                $povezava = mysqli_connect("localhost", "root", "", "lidl");
                if(mysqli_connect_errno()) {
                die("Povezava s podatkovno zbirko ni vzpostavljena: " .mysqli_connect_error()." (" . mysqli_connect_errno() . ")"
                );
                }


                $id_user = $_SESSION["username"];
                $sql = "SELECT * FROM `rezultat` WHERE  ID_uporabnik  ='".$id_user."';";
                $res = mysqli_query($povezava, $sql);
                print_r($res);
                while ($izpis = mysqli_fetch_array($res)){

                    $datum=$izpis["Datum"];
                    $pravilni=$izpis["Pravilni"];
                    $vse_moznosti=$izpis["Vsi_mozni"];

                echo'<tr>';
                    echo'    <td>'.$datum.'</td>';
                    echo'   <td>'.$pravilni.'</td>';
                    echo'   <td>'.$vse_moznosti.'</td>';
                echo '</tr>';
                }
                ?>
            </table>
        </div>
</html>