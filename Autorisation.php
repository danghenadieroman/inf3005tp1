<html>
    <head>
        <title>Modification</title>
        <link rel="stylesheet" type="text/css" href="css/principal.css"  />
    </head>
    <body>
        <?php
        session_start();

        $db = mysql_connect('localhost', 'root');
        mysql_select_db('db_hd791183', $db);

        $_SESSION['logins'] = $_POST['login'];
        $_SESSION['passwords'] = $_POST['password'];

        $login = $_SESSION['logins'];
        $password = $_SESSION['passwords'];

        $sql = "SELECT email FROM commandes WHERE `login` = '$login' and `password` = '$password'";
        $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());

        $data = mysql_fetch_assoc($req);
        echo "<div>";
        if ($data['email'] != NULL) {
            echo "Bienvenue " . $login . "!<br><br>";
            echo "Si vous voulez vous pouvez modifier les informations personnelles <br> ";
            echo "ou laisser tels quelles ont été déja fournis";
            ?>
            <form action="Modifications.php" method="post" enctype="multipart/form-data" >
                <br>
                <input type="submit" name="envoi" value="Continuer" />
            </form>
            <?php
        } else {
            header("location:PersonalInfo.html");
        }
        echo "</div>";
        mysql_close();
        ?>
    </body>
</html>
