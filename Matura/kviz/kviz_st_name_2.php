<?php 
$povezava = mysqli_connect("localhost", "root", "", "lidl");

if(mysqli_connect_errno()) {
    die("Povezava s podatkovno zbirko ni vzpostavljena: " .mysqli_connect_error()." (" . mysqli_connect_errno() . ")"
);
}

$naziv = $_GET["vrsta"];
echo "zdej pa kle";
$sql = "SELECT ID FROM `kategorija` WHERE Naziv LIKE '%".$naziv."%';";
$res = mysqli_query($povezava, $sql);
$izpis = mysqli_fetch_assoc($res);
session_start();
$_SESSION['vrsta'] = $izpis["ID"];
$list =array();
$_SESSION["list"] = $list;
$_SESSION['tocke']=0;

echo "tukaj sem";

header('Location:http://localhost/Matura/kviz/kviz_vprasanja_3.php');

?>
