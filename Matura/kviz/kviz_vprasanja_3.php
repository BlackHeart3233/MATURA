<?php
session_start();
$vrsta= $_SESSION['vrsta'];
$tocke=$_SESSION['tocke'];
$list = $_SESSION["list"];
$id_user = $_SESSION['username'];
$povezava = mysqli_connect("localhost", "root", "", "lidl");

if(mysqli_connect_errno()) {
    die("Povezava s podatkovno zbirko ni vzpostavljena: " .mysqli_connect_error()." (" . mysqli_connect_errno() . ")"
);
}


$sql = "SELECT COUNT(*) FROM `plu` WHERE  kategorija_ID ='".$vrsta."';";
$res = mysqli_query($povezava, $sql);
$st_moznost = mysqli_fetch_assoc($res);
$st_moznost =  $st_moznost["COUNT(*)"];
$st_moznost = intval($st_moznost[0]);

$dolzina= count($list);

if ($dolzina > 0){
    $zadnji = end($list);
    $sql = "SELECT plu_koda FROM `plu` WHERE  ID ='".$zadnji."';";
    $ress = mysqli_query($povezava, $sql);
    $odgovor_plu = mysqli_fetch_assoc($ress);
    $odgovor_plu = $odgovor_plu["plu_koda"];
    $odgovor_prejsen = $_GET["stevilke"];

    if ($odgovor_plu == $odgovor_prejsen){
        $tocke = $tocke + 1;
        $_SESSION['tocke'] =$tocke;
    }
}


if ($st_moznost == $dolzina){
    header('Location:http://localhost/Matura/Rezultati.php');
    $sql = "INSERT INTO rezultat (Pravilni, Vsi_mozni, Datum, kategorija_ID, ID_uporabnik) VALUES ('".$tocke."', '".$st_moznost."', '".date("Y.m.d")."', '".$vrsta."', '".$id_user."')";
    if ($povezava->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $povezava->close();
    

}else{





$pravilni = rand(1, $st_moznost);
while (in_array($pravilni,$list)){
    $pravilni = rand(1, $st_moznost);
}
array_push($list,$pravilni);



$sql = "SELECT Naziv, plu_koda FROM `plu` WHERE  ID ='".$pravilni."';";
$vprasanje = mysqli_query($povezava, $sql);
$vprasanje = mysqli_fetch_assoc($vprasanje);
$koda_pravilni = $vprasanje["plu_koda"];
$vprasanje  = $vprasanje["Naziv"];

$list_st =array();
array_push($list_st,$pravilni);
$moznost = rand(1, $st_moznost);



for ($k =1;$k<4;$k++){
    while ($pravilni == $moznost or in_array($moznost,$list_st ) ){
        $moznost = rand(1, $st_moznost);
    }
    array_push($list_st,$moznost);
} 
}
?>

<html>
    <head>
        <title>Kviz</title>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="kviz_vprasanja_3.css" >
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    </head>
    <body>
    <div class = "inside">
        <div id="vprasanje">
            <?php
            echo'<h1>'.$vprasanje.'</h1>';
            ?>
        </div>
        <div id="odgovor">
            <form action="/Matura/kviz/kviz_vprasanja_3.php" method="GET">
        <?php
                sort($list_st);
                foreach ($list_st as $id) {
                    $sql = "SELECT plu_koda FROM `plu` WHERE  ID ='".$id."';";
                    $koda = mysqli_query($povezava, $sql);
                    $koda = mysqli_fetch_assoc($koda);
                    $koda = $koda["plu_koda"];

                    echo'<label for="stevilke"></label>';
                    echo'<input class="gumb_nav" type="submit" id="stevilke" name="stevilke" value="'.$koda.'">';

                }
                $_SESSION["list"] = $list;
        ?>
            </form>
        </div>
