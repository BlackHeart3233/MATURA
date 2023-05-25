<?php
$povezava = mysqli_connect("localhost", "root", "", "lidl");

if(mysqli_connect_errno()) {
    die("Povezava s podatkovno zbirko ni vzpostavljena: " .mysqli_connect_error()." (" . mysqli_connect_errno() . ")"
);
}

$username = $_POST["username"];
$passwd = $_POST["passwd"];

$sql = "SELECT Username, Geslo FROM `uporabnik` WHERE Username LIKE '".$username."';";
$res = mysqli_query($povezava, $sql);


$izpis = mysqli_fetch_array($res);
if(isset($izpis)){
    if($izpis["Username"] == $username and $izpis["Geslo"] == $passwd){
        $sql = "SELECT ID FROM `uporabnik` WHERE Username LIKE '%".$username."%';";
        $uporabnik = mysqli_query($povezava, $sql);
        $izpis = mysqli_fetch_assoc($uporabnik);
        $id_user = $izpis["ID"];

        session_start();

        $_SESSION['username'] = $id_user;
    
        header('Location:http://localhost/Matura/home.php');

        }else{
        echo"napacno geslo";
        header('Location:http://localhost/Matura/login.php?napaka="napacno geslo"');

    }
 }else{
    echo "Uporabnik ne obstaja";
    header('Location:http://localhost/Matura/login.php?napaka="uporabnik ne obstaja"');

 }