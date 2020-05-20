<?php
    // code source de connexion.php
    $host = "192.168.43.200";
    $user_mysql = "root";    // nom de l'utilisateur MySQL 
    $password_mysql = "";    // mot de passe de l'utilisateur MySQL
    $database = "BDD_intranet";

        $db = mysqli_connect($host, $user_mysql, $password_mysql, $database);

        if(!$db)
        {
            echo "Echec de la connexion\n";
            exit();
        }

        mysqli_set_charset($db, "utf8");
    ?>

    <!DOCTYPE>
    <html>
        <head>
            <title>Stage5</title>

        <h1>by-pass privilège</h1>
        <br>
            <meta charset="UTF-8" />
        </head>
        <style media="screen">
        body {
    background-image: url('Background.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
    }
    input
      {
        display: block;
        margin: auto;
        width: 20%;
        padding: 8px;

      }
      b
      {

        display: block;
        margin: auto;
        width: 20%;
        padding: 8px;
      }
        </style>
        <h1>Voici le stage 5</h1>

        <h3>ici l'utilisateur est invité a ce connecter cependant il est automatiquement admis en tant que user au rang 1 </h3>
        <h5>Votre mission est de faire une elevation de privilège pour qu'il ait le meme rang que l'admin</h5>
        <h4>Bonne chance</h4>
        <body>

            <?php
            if(!empty($_GET['username']) && !empty($_GET['password']))
            {
                $username = $_GET['username'];
                $password = $_GET['password'];

                $query = "SELECT username FROM users WHERE username = '".$username."'";
                $rs = mysqli_query($db, $query);

                if(mysqli_num_rows($rs) >= 1)
                {
                    echo "Ce pseudo est déjà utilisé.\n";
                }
                else
                {
                    mysqli_query($db, "INSERT INTO users (username, password, rank) VALUES ('".$username."', '".$password."', 2)");
                }

                mysqli_free_result($rs);
                mysqli_close($db);
            }
            ?>

            <form action="Stage5.php" method="GET">
                <b>Pseudo :</b> <input type="text" name="username"/>
                <b>Mot de passe :</b> <input type="text" name="password" />
                <br>
                <input type="submit" value="S'inscrire" />
            </form>
        </body>
    </html>
