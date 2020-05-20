<?php
    // code source de connexion.php
    $host = "192.168.43.200";
    $user_mysql = "root";    // nom de l'utilisateur MySQL 
    $password_mysql = "";    // mot de passe de l'utilisateur MySQL
    $database = "BDD_intranet";

    $db = mysqli_connect($host, $user_mysql, $password_mysql, $database);

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

        <title></title>
        <style>
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

.popup .popuptext {
                    visibility: hidden;
                    width: 600px;
                    background-color: #555;
                    color: #fff;
                    text-align: center;
                    border-radius: 6px;
                    padding: 8px 0;
                    position: absolute;
                    z-index: 1;
                    bottom: 125%;
                    left: 50%;
                    margin-left: -80px;
                  }


                  /* Toggle this class - hide and show the popup */
.popup .show {
                    visibility: visible;
                    -webkit-animation: fadeIn 1s;
                    animation: fadeIn 1s;
                  }

                  /* Add animation (fade in the popup) */
                  @-webkit-keyframes fadeIn {
                    from {opacity: 0;}
                    to {opacity: 1;}
                  }

                  @keyframes fadeIn {
                    from {opacity: 0;}
                    to {opacity:1 ;}
                }
.popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
        </style>
    </head>
    <body>

        <h1>Hackathon</h1>
        <br>
        <a href="Stage2.php">Passer au Stage 2</a>

        <?php
        if(!empty($_GET['username']) && !empty($_GET['password']))
        {
           // $db correspond à la connexion à la base de données (voir mysqli_connect)
            $username = mysqli_real_escape_string($db, $_GET['username']);
            $password = mysqli_real_escape_string($db, $_GET['password']);

            $query = "SELECT id, username FROM users WHERE username = '".$username."' AND password = '".$password."'";
            $rs = mysqli_query($db, $query);

            if(mysqli_num_rows($rs) == 1)
            {
                $user = mysqli_fetch_assoc($rs);

                echo "Bienvenue ".htmlspecialchars($user['username']);
            }
            else
            {
                echo "Mauvais nom d'utilisateur et/ou mot de passe !";
            }

            mysqli_free_result($rs);
            mysqli_close($db);
        }
        ?>

        <br>
        <br>
        <br>
        <br>
                <form action="Stage1cor.php" method="GET">
                    <b>Nom d'utilisateur :</b> <input type="text" name="username"/>
                    <b>Mot de passe :</b> <input type="password" name="password" />
                    <br>
                    <input type="submit" value="Connexion" />
                </form>
                <br>
                <div class="popup" onclick="myFunction()">Cliquez ici pour plus d'info sur le correctif
          <span class="popuptext" id="myPopup">Le problème vient de la requette traitée par php :

                $username = $_GET['username'];
                $password = $_GET['password'];


                En effet on peut voir qu’il n’y a aucune verification des donnée saisi.
                 Pour cela nous allons ajouter une verification :


                $username = mysqli_real_escape_string($db, $_GET['username']);
                $password = mysqli_real_escape_string($db, $_GET['password']);

</span>
        </div>
        <script>
        // When the user clicks on div, open the popup
        function myFunction() {
          var popup = document.getElementById("myPopup");
          popup.classList.toggle("show");
        }
        </script>
            </body>
        </html>
