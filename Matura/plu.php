<html>
    <?php
    session_start();


    if(!isset($_SESSION['username'])){
        header('Location:http://localhost/Matura/login.php');
    }

    if (isset($_GET["vrsta"])){
        $vrsta = $_GET["vrsta"];
    }else{
        $vrsta=1;
    };
    if (isset($_GET["naziv"])){
        $naziv = $_GET["naziv"];
    }else{
        $naziv="";
    }
    ?>

    <head>
        <title>Plu</title>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="nav_bar.css" >
        <link rel="stylesheet" href="plu.css" >
    </head>
    <body>
        <div id="navbar">
            <a href="/Matura/akcija/logout.php"><img id="logo" class="nav_item"src="slike/Lidl-Logo.svg.png"> </a>
            <a href="/Matura/kviz/kviz_meni_1.php" class="nav_item gumb_nav ">Kviz</a>
            <a href="/Matura//plu.php"  class="nav_item gumb_nav ">PLU</a>
            <a href="/Matura/Rezultati.php"  class="nav_item gumb_nav">Rezultati</a>
        </div>
        <div id="filter">
            <form id="filter_vrsta_naziv" method="GET">
                <label for="vrsta">VRSTA: </label>
                <select name="vrsta" id="vrsta">
                    <option value="1">Dopeka</option>
                    <option value="2">Zelenjava</option>
                    <option value="3">Sadje</option>
                </select>
                <label for="Naziv">NAZIV: </label>
                <input name ="naziv"type="text"id="Naziv">
                <input type="submit" value="IŠČI" id="submit">
            </form>
        </div>
        <div id="PLU_stran">
        <?php 
        $povezava = mysqli_connect("localhost", "root", "", "lidl");

        if(mysqli_connect_errno()) {
            die("Povezava s podatkovno zbirko ni vzpostavljena: " .mysqli_connect_error()." (" . mysqli_connect_errno() . ")"
        );
        }


        $sql = "SELECT * FROM `plu` WHERE  kategorija_ID ='".$vrsta."' AND Naziv LIKE '%".$naziv."%';";
        $res = mysqli_query($povezava, $sql);
        while ($izpis = mysqli_fetch_array($res)){
            $st =$izpis["plu_koda"];
            $ime=$izpis["Naziv"];
            $slika ="slike/plu/". $izpis["slika"];
            $class ="okvircek";
            echo "<div class=".$class.">";
            echo  '<img class="slika" src="'.$slika.'">';
            echo  '<div class="ime">'.$ime.'</div>';
            echo  '<div class="PLU">'.$st.'</div>';

            echo" </div>  ";
        };
        ?>          
        </div>
    </body>
</html>