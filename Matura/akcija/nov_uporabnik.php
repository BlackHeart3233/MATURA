<?php
$povezava = mysqli_connect("localhost", "root", "", "lidl");

if(mysqli_connect_errno()) {
    die("Povezava s podatkovno zbirko ni vzpostavljena: " .mysqli_connect_error()." (" . mysqli_connect_errno() . ")"
);
}

$username = $_POST["username"];
$passwd = $_POST["passwd"];
$date = $_POST["date"];

$sql = "SELECT ID FROM `uporabnik` WHERE Username LIKE '".$username."';";
$res = mysqli_query($povezava, $sql);


$izpis = mysqli_fetch_array($res);
if(isset($izpis)){
        header('Location:http://localhost/Matura/registracija.php?napaka="Uporabnik obstaja"');

 }else{
    $sql = "INSERT INTO uporabnik(Username,Geslo,Datum_rojstva)  VALUES ('".$username."','".$passwd."','".$date."');";
    $res = mysqli_query($povezava, $sql);
    echo "Uporabnik je registriran!";
    header('Location:http://localhost/Matura/login.php');


 }

