<?php
    // code source de connexion.php
    $host = "192.168.43.200";
    $user_mysql = "root";    // nom de l'utilisateur MySQL 
    $password_mysql = "";    // mot de passe de l'utilisateur MySQL
    $database = "BDD_intranet";


    $db = mysqli_connect($host, $user_mysql, $password_mysql, $database);
    mysqli_set_charset($db, "utf8");
?>

<!DOCTYPE>
<html>
    <head>
        <title>Stage2</title>
    </head>
    <style media="screen">
    body {
background-image: url('Background.png');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
}
    </style>
    <h1>Voici le stage 2</h1>

    <h3>Ici le site web est connecté aux articles hebergé sur la Base de données.</h3>
    <h5>Votre mission est d'afficher les données se trouvant dans la table dédié au utilisateur.Pour cela vous allez devoir modifier l'URL en y injectant des instruction SQL</h5>
    <h4>Bonne chance</h4>
    <body>
        <?php
            if(!empty($_GET['category']))
            {
                $category = mysqli_real_escape_string($db, $_GET['category']);
                $query = "SELECT id, title, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM articles WHERE category_id = ".$category;
                $rs_articles = mysqli_query($db, $query);

                echo "<u>\n";

                if(mysqli_num_rows($rs_articles) > 0)
                {
                    while($r = mysqli_fetch_assoc($rs_articles))
                    {
                        echo "<li><a href=\"#\">".htmlspecialchars($r['title'])." - ".$r['date']."</a></li>\n";
                    }
                }

                echo "</u>\n";
            }
        ?>
    </body>
</html>
