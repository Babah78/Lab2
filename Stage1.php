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
                    width: 160px;
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


        <?php
        if(!empty($_GET['username']) && !empty($_GET['password']))
        {
            $username = $_GET['username'];
            $password = $_GET['password'];

            $query = "SELECT id, username FROM users WHERE username = '".$username."' AND password = '".$password."'";
            $rs = mysqli_query($db, $query);

            if(mysqli_num_rows($rs) == 1)
            {
                $user = mysqli_fetch_assoc($rs);

                echo "Bienvenue ".htmlspecialchars($user['username']." Stage 1 réussi");
                echo '<a href="Stage1cor.php"> Correctif </a>';
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
        <form action="Stage1.php" method="GET">
            <b>Nom d'utilisateur :</b> <input type="text" name="username"/>
            <b>Mot de passe :</b> <input type="password" name="password" />
            <br>
            <input type="submit" value="Connexion" />
        </form>
        <br>
        <div class="popup" onclick="myFunction()">Cliquez ici pour plus d'aide
  <span class="popuptext" id="myPopup">Je me passerais de vos COMMENTAIRES !</span>
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