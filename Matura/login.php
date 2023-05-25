
<html>
    <head>
            <meta charset="UTF-8"/> 
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="login.css"/>
            <link rel="stylesheet" type="text/css" href="reg_login.css"/>

            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class = "inside">
            <div>
                <img src="slike/lidl.jpg">
            </div>
            <div id="login">
                <form action="akcija/login_uporabnik.php" method="post" >
                    <label for="username">Username </label>
                    <input name = "username" type="text" id="username"><br><br>
                    <label for="passwd">Password </label>
                    <input name ="passwd" type="password" id="passwd"><br><br>
                    <div> <?php 
                    if (isset($_GET["napaka"])){
                        echo $_GET["napaka"];
                    }
                    ?>
                    </div>
                    <button type ="submit">Sign in</button>
                </form>
                <a id="link_reg" href="/Matura/registracija.php">registracija</a>
            </div>
        </div>

    </body>
</html>