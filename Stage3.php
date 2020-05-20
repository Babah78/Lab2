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
        <title>Stage3</title>

    <h1>Connexion par brute force_1</h1>
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
    </style>
    <h1>Voici le stage 3</h1>

    <h3>Ici le site web vérifie si un utilisateur correspondant à l'ID entré en paramètre existe ou non. Le site nous dit juste « Utilisateur existant. » ou « Utilisateur inexistant. » </h3>
    <h5>Votre mission est d'effectuer des instructions SQL qui vont vous permettre de deduire le mot de passe de l'utilisateur admin</h5>
    <h4>Bonne chance</h4>
    <body>

        <?php
            if(!empty($_GET['id']))
            {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                $query = "SELECT id, username FROM users WHERE id = ".$id;
                $rs_article = mysqli_query($db, $query);

                if(mysqli_num_rows($rs_article) == 1)
                {
                    echo "<p>Utilisateur existant.</p>";
                }
                else
                {
                    echo "<p>Utilisateur inexistant.</p>";
                }
            }
        ?>
        <form action="Stage3.php" method="GET">
            <b> Saisissez l'injection:</b> <input type="text" name="pass" />
            <br>
            <input type="submit" value="Verification" />
            <?php
            if ($_GET['pass']=="id=-1 UNION SELECT 1,2 FROM users WHERE id = 1 AND password LIKE 0x7061737325")
                echo '<a href="Stage4.php">Passez au Stage4</a>';
               else {
                 echo "Essayez encore";
               }
               ?>


    </body>
</html>
