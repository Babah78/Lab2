<?php
    // code source de connexion.php
    $host = "192.168.43.200";
    $user_mysql = "root";    // nom de l'utilisateur MySQL 
    $password_mysql = "";    // mot de passe de l'utilisateur MySQL
    $database = "BDD_intranet";

    $db = mysqli_connect($host, $user_mysql, $password_mysql, $database);
    mysqli_set_charset($db, "utf8");
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Stage4</title>

    <h1>Connexion par brute force_1</h1>
    <br>
        <meta charset="UTF-8" />
    </head>
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
    <h1>Voici le stage 4</h1>

    <h3>Ce stage est similaire au stage 3 cependant nous avons "aucune" reponse du serveur » </h3>
    <h5>Votre mission est d'effectuer des instructions SQL qui vont vous permettre de deduire le mot de passe de l'utilisateur admin</h5>
    <h4>Bonne chance</h4>
    <body>

        <?php
            if(!empty($_GET['id']))
            {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                $query = "SELECT id, username FROM users WHERE id = ".$id;
                $rs_article = mysqli_query($db, $query);
            }
        ?>

        <br>
        <div class="popup" onclick="myFunction()">Cliquez ici pour plus d'aide
  <span class="popuptext" id="myPopup">Le temps est la clé de la reussite</span>
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
