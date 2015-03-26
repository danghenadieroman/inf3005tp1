<html>
    <head>
        <title>Modification</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/principal.css"  />

        <script type="text/javascript">
            function validateForm() {
                var photo = document.getElementById("nomFichier").value;
                if (photo == null || photo == "") {
                    alert("Un photo doit etre fournie!");
                    return false;
                }
            }
        </script>

    </head>
    <body>
        <?php
        session_start();

        $db = mysql_connect('localhost', 'root');
        mysql_select_db('db_hd791183', $db);

        $login = $_SESSION['logins'];
        $password = $_SESSION['passwords'];

        
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

        mysql_close();
        ?>
        <p>
            <a href="Autorisation.html"><img src="img/home-icon-white.png" alt="acceuil" height="42" width="42"></a>
        </p>
        <div>
            <fieldset>
                <legend><b>Les données personnels</b></legend>
                <p>
                    Si vous avez bésoin, vous pouvez modifier vos données <br>
                    directement dans le formulaire avant de les envoyées
                </p>
                <form action = "index.php" method = "post" enctype = "multipart/form-data" onsubmit = "return validateForm()">
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
                        <tr>
                            <td>Séléctionnez le fichier : </td>
                            <td><input type = "file" name = "nomDuFichier" id = "nomFichier"/></td>
                        </tr>
                    </table>
                    <input type = "submit" name = "envoi" value = "Envoyer" />
                </form>
            </fieldset>
        </div>
    </body>
</html>
