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
        
        $loginModif = $login;
        $passwordModif = $password;
        $telephones = "SELECT telephone FROM commandes WHERE `login` = '$login' and `password` = '$password'";
        $adresses = "SELECT adresse FROM commandes WHERE `login` = '$login' and `password` = '$password'";
        $emails = "SELECT email FROM commandes WHERE `login` = '$login' and `password` = '$password'";

        $req_telefone = mysql_query($telephones) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
        $req_adresse = mysql_query($adresses) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
        $req_email = mysql_query($emails) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());

        $data_telephone = mysql_fetch_assoc($req_telefone);
        $data_adresse = mysql_fetch_assoc($req_adresse);
        $data_email = mysql_fetch_assoc($req_email);

        $data = mysql_fetch_assoc($req);
        echo " <p> <a href=\"Autorisation.html\"><img src=\"img/home-icon-white.png\" alt=\"acceuil\" height=\"42\" width=\"42\"></a> </p>";
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
      
        mysql_close();
        ?>
        
       
        
            <fieldset>
                <legend><b>Les données personnels</b></legend>
                <form action = "modification_redirect.php" method = "post" enctype = "multipart/form-data" onsubmit = "return validateForm()">
                    <table>
                        <tr>
                            <td>Mod de pass:</td>
                            <td><input type = "text" name = "password" value="<?php echo $passwordModif ?>" autofocus /></td>
                        </tr>
                        
                        <tr>
                            <td>Numéro de téléphone:</td>
                            <td><input type = "text" name = "telephone" value="<?php echo $data_telephone['telephone'] ?>" autofocus /></td>
                        </tr>
                        <tr>
                            <td>Adresse:</td>
                            <td><input type = "text" name = "adresse" value="<?php echo $data_adresse['adresse'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Courriel:</td>
                            <td><input type = "text" name = "email" value="<?php echo $data_email['email'] ?>"/></td>
                        </tr>
                    </table>
                    <input type = "submit" name = "modifier" value = "Modifier" />
                </form>
            </fieldset>
        </div>
        
    </body>
</html>
