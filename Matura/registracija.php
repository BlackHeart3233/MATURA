<html>
    <head>
            <meta charset="UTF-8"/> 
            <title>Registracija</title>
            <link rel="stylesheet" type="text/css" href="registracija.css"/>
            <link rel="stylesheet" type="text/css" href="reg_login.css"/>

            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class = "inside">
            <div>
                <img src="slike/lidl.jpg">
            </div>
            <div id="registracija">
                <form action="akcija/nov_uporabnik.php" method="post" >
                    <label for="username">Username </label>
                    <input  name ="username" type="text" id="username"><br><br>
                    <label for="passwd">Password </label>
                    <input name ="passwd" type="password" id="passwd"><br><br>
                    <label for="date">Date of birth </label>
                    <input name="date" type="date" id="date"><br><br>
                    <div> <?php 
                    if (isset($_GET["napaka"])){
                        echo $_GET["napaka"];
                    }
                    ?>
                    </div>
                    <button type ="submit">Sign up</button>
                </form>
                <a id="login" href="/Matura/login.php">login</a>
            </div>
        </div>

    </body>
</html>