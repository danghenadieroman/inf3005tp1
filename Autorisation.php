

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
        if (!$data['email'] == NULL) {
            echo "Bienvenue " . $login . "<br>";
            echo "Vous pouvez modifier les informations personnelles ou laisser les champs vides ";
            ?>
            <form action="Modifications.html" method="post"  enctype="multipart/form-data" >
                <input type="submit" name="envoi" value="Continuer" />
            </form>
            <?php
        } else {
            header("location:PersonalInfo.html");
        }
        mysql_close();
        ?>
    </body>
</html>
