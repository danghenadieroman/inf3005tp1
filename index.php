<?php
session_start();

$fichierTransmis = $_FILES['nomDuFichier']['name'];
$fichierTransmisSize = $_FILES['nomDuFichier']['size'] . "";
//echo "Son type : ". $_FILES['nomDuFichier']['type']. "";
//echo "Fichier temporaire : ". $_FILES['nomDuFichier']['tmp_name']. "";
//echo "Fichier transmis: ". $fichierTransmis. "";
$fichierCharge = $_FILES['nomDuFichier']['tmp_name'];
$fichierCopie = 'Images/' . $_FILES['nomDuFichier']['name'];
$fichierCopieSize = 'Images/' . $_FILES['nomDuFichier']['size'];
if (!file_exists($fichierCopie) && !($fichierTransmisSize == $fichierCopieSize)) {
    move_uploaded_file($fichierCharge, $fichierCopie);
    echo "Stocke dans : " . $fichierCopie;
} else {
    echo "Ce fichier existe deja!";
}
echo "<br>";
$nomImage = "Images/" . $fichierTransmis;
$img = '<img src="' . $nomImage . '" id = "monImage"/>';

$info = getimagesize($nomImage);
$largeur = $info[0] . "";
$hauteur = $info[1] . "";

$ratio = $largeur / $hauteur;
$hauteur1 = (200 / $ratio);
$hauteur2 = (400 / $ratio);
$hauteur3 = (600 / $ratio);

$db = mysql_connect('localhost', 'root');
mysql_select_db('db_hd791183', $db);

$login = $_SESSION['logins'];
$_SESSION['telephones'] = $_POST['telephone'];
$telephone = $_SESSION['telephones'];
$_SESSION['adresses'] = $_POST['adresse'];
$adresse = $_SESSION['adresses'];
$_SESSION['emails'] = $_POST['email'];
$email = $_SESSION['emails'];

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
        <link rel="stylesheet" type="text/css" href="css/Style.css"/>
        <link rel="stylesheet" type="text/css" href="css/principal.css"  />
        <script type="text/javascript" src="index.js"></script>
    </head>
    <body>
        <p>
            <a href="Autorisation.html"><img src="img/home-icon-white.png" alt="acceuil" height="42" width="42"></a>
        </p>
        <div>
            <fieldset>
                <legend><b>Detail de la commande</b></legend>

                <form action="final.php" method="post"  enctype="multipart/form-data" onsubmit="return validateDimentions()">
                    <table>
                        <tr>
                            <td>
                                <div id="photo">
                                    <?php echo $img; ?>
                                </div>
                                Dimensions:
                            </td>
                            <td>
                                <select id="mySelect" onchange="sizeFunction()" name="dimentionSelect"> 
                                    <option > </option> 
                                    <option value = "13 x <?php echo (int) ($hauteur1 / 37.79) ?> 
                                            cm">13 x <?php echo (int) ($hauteur1 / 37.79) ?> cm</option> 
                                    <option value = "21 x <?php echo (int) ($hauteur2 / 37.79) ?> 
                                            cm">21 x <?php echo (int) ($hauteur2 / 37.79) ?> cm</option> 
                                    <option value = "26 x <?php echo (int) ($hauteur3 / 37.79) ?> 
                                            cm">26 x <?php echo (int) ($hauteur3 / 37.79) ?> cm</option> 
                                </select > 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p id="demo"></p>
                                Type de materiel:
                            </td>
                            <td>
                                <select id="frameType" name="frameType" onchange="materielFunction()">
                                    <option value = "bois" >Bois</option>
                                    <option value = "metal">Metal</option>
                                </select>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p id="materiel"></p>
                                Profondeur des marges:
                            </td>
                            <td>
                                <select id="profondeur" name="profondeur" onchange="profondeurFunction()">
                                    <option value = "1cm"></option>
                                    <option value = "1cm" selected>1 cm</option>
                                    <option value = "2cm">2 cm</option>
                                    <option value = "3cm">3 cm</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p id="profondeurMarges"></p>
                                Largeur des marges:
                            </td>
                            <td>
                                <select id="largeurMarges" name="largeurMarges" onchange="margeFunction()">
                                    <option value = "1cm"></option>
                                    <option value = "1cm" selected>1 cm</option>
                                    <option value = "2cm">2 cm</option>
                                    <option value = "3cm">3 cm</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p id="marges"></p>
                                Couleur de cadre:
                            </td>
                            <td>
                                <select id="frameColor" name="frameColor" onclick="colorFunction()">
                                    <option value = "bois" ></option>
                                    <option value = "red" selected>Rouge</option>
                                    <option value = "black" >Noir</option>
                                    <option value = "brown" >Brun</option>
                                    <option value = "white" >Blanc</option>
                                    <option value = "blue" >Bleu</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p id="color"></p>
                                Modele de cadre:
                            </td>
                            <td>
                                <select id="framePart" name="framePart" onchange="frameFunction()">
                                    <option ></option>
                                    <option value = "top" selected>Haut</option>
                                    <option value = "right" >Droit</option>
                                    <option value = "bottom" >Bas</option>
                                    <option value = "left" >Gauche</option>
                                </select>
                            </td>
                        </tr>

                        <p id="frame" name = "frame"></p>

                        <input type="hidden" id="topcolor" name="topcolor" value=""> </input>
                        <input type="hidden" id="bottomcolor" name="bottomcolor" value=""> </input>
                        <input type="hidden" id="rightcolor" name="rightcolor" value=""> </input>
                        <input type="hidden" id="leftcolor" name="leftcolor" value=""> </input>
                    </table>

                    <input type="submit" name="terminer" value="Terminer" />
                </form>
            </fieldset>

        </div>
    </body>
</html>
