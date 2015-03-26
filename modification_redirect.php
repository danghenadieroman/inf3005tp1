<?php
session_start();

$db = mysql_connect('localhost', 'root');
mysql_select_db('db_hd791183', $db);

$login = $_SESSION['logins'];

if (isset($_POST['password'])) {
    $_SESSION['password'] = $_POST['password'];
    $password = $_SESSION['password'];
} else {
    $password = $_SESSION['passwords'];
}

$_SESSION['telephones'] = $_POST['telephone'];
$telephone = $_SESSION['telephones'];

$_SESSION['adresses'] = $_POST['adresse'];
$adresse = $_SESSION['adresses'];

$_SESSION['emails'] = $_POST['email'];
$email = $_SESSION['emails'];

if ($password == "" || $password == NULL) {
    $sqlAncienPassword = "SELECT password FROM commandes WHERE login='$login'";
    $reqAncienPassword = mysql_query($sqlAncienPassword) or die('Erreur SQL !<br>' . $sqlAncienPassword . '<br>'
                    . mysql_error());
    $i = 0;
    while ($row = mysql_fetch_array($reqAncienPassword)) {
        $list[$i] = $row['password'];
        $i++;
    }
    $_SESSION['password'] = $list[$i - 1];
} else {
    $sqlNouveauPassword = "UPDATE commandes SET password = '$password' WHERE login='$login'";
    $reqNouveauPassword = mysql_query($sqlNouveauPassword) or die('Erreur SQL !<br>' . $sqlNouveauPassword . '<br>'
                    . mysql_error());
}

if ($telephone == "" || $telephone == NULL) {
    $sqlAncienTelephone = "SELECT telephone FROM commandes WHERE login='$login'";
    $reqAncienTelephone = mysql_query($sqlAncienTelephone) or die('Erreur SQL !<br>' . $sqlAncienTelephone . '<br>'
                    . mysql_error());
    $i = 0;
    while ($row = mysql_fetch_array($reqAncienTelephone)) {
        $list[$i] = $row['telephone'];
        $i++;
    }
    $_SESSION['telephones'] = $list[$i - 1];
} else {
    $sqlNouveauTelepnone = "UPDATE commandes SET telephone = '$telephone' WHERE login='$login'";
    $reqNouveauTelepnone = mysql_query($sqlNouveauTelepnone) or die('Erreur SQL !<br>' . $sqlNouveauTelepnone . '<br>'
                    . mysql_error());
}

if ($adresse == "" || $adresse == NULL) {
    $sqlAncienAdresse = "SELECT adresse FROM commandes WHERE login='$login'";
    $reqAncienAdresse = mysql_query($sqlAncienAdresse) or die('Erreur SQL !<br>' . $sqlAncienAdresse . '<br>'
                    . mysql_error());
    $i = 0;
    while ($row = mysql_fetch_array($reqAncienAdresse)) {
        $list[$i] = $row['adresse'];
        $i++;
    }
    $_SESSION['adresses'] = $list[$i - 1];
} else {
    $sqlNouveauAdresse = "UPDATE commandes SET adresse = '$adresse' WHERE login='$login'";
    $reqNouveauAdresse = mysql_query($sqlNouveauAdresse) or die('Erreur SQL !<br>' . $sqlNouveauAdresse . '<br>'
                    . mysql_error());
}


if ($email == "" || $email == NULL) {
    $sqlAncienEmail = "SELECT email FROM commandes WHERE login='$login'";
    $reqAncienEmail = mysql_query($sqlAncienEmail) or die('Erreur SQL !<br>' . $sqlAncienEmail . '<br>'
                    . mysql_error());
    $i = 0;
    while ($row = mysql_fetch_array($reqAncienEmail)) {
        $list[$i] = $row['email'];
        $i++;
    }
    $_SESSION['emails'] = $list[$i - 1];
} else {
    $sqlNouveauEmail = "UPDATE commandes SET email = '$email' WHERE login='$login'";
    $reqNouveauEmail = mysql_query($sqlNouveauEmail) or die('Erreur SQL !<br>' . $sqlNouveauEmail . '<br>'
                    . mysql_error());
}

mysql_close();
?>

<html>
    <head>
        <!--<meta http-equiv="refresh" content="0; URL='Autorisation.php'" />--> 
        <script type="text/javascript" src="PersonalInfo.js"></script>
        <link rel="stylesheet" type="text/css" href="css/principal.css"  />
        
    </head>
    <body>
        *** Les données personnels ont été bien modifié. ***<br>
        *** Veuillez vous autoriser de nouveaux. ***

        <div>

            <fieldset>
                <legend><b>Formulaire d'autorisation</b></legend>

                <form action="Autorisation.php" method="post"  enctype="multipart/form-data" onsubmit="return validateChamps()" >
                    <table>
                        <tr>
                            <td>Nom d’usager:</td> 
                            <td><input type="text" name="login" id="login" autofocus /></td>
                        </tr>
                        <tr>
                            <td>Mot de passe:</td>
                            <td> <input type="text" name="password" id="password"/></td>
                        </tr>
                    </table>
                    <p>Autoriser vous!
                        <br>Si vous n'avez pas de compte, 
                        <br>entrez un nom d'usager et mot de pass 
                        <br>pour crée un nouveau compte
                    </p>
                    <input type="submit" name="envoi" value="Envoyer" />
                </form>
            </fieldset>
        </div>
    </body>
</html>
