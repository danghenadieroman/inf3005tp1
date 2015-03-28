<?php echo "Payement!";

session_start();
$login = $_SESSION['logins'];
$password = $_SESSION['passwords'];
$telephone = $_SESSION['telephones'];
$adresse = $_SESSION['adresses'];
$email = $_SESSION['emails'];
$db = mysql_connect('localhost', 'root');
mysql_select_db('db_hd791183', $db);
$dimentions = $_POST['dimentionSelect'];
$materiel = $_POST['frameType'];
$profondeurMarges = $_POST['profondeur'];
$_SESSION['border'] = $_POST['largeurMarges'];
$largeurMarges = $_SESSION['border'];
$topcolor = $_POST['topcolor'];
$bottomcolor = $_POST['bottomcolor'];
$rightcolor = $_POST['rightcolor'];
$leftcolor = $_POST['leftcolor'];
$sql = "INSERT INTO commandes (`login`, `password`, `telephone`, `adresse`,
        `email`,`dimentions`,`materiel`,`profondeurMarges`,`largeurMarges`,`topcolor`,`bottomcolor`,
        `rightcolor`,`leftcolor`)
        VALUES ('$login', '$password', '$telephone', '$adresse', '$email',
        '$dimentions','$materiel','$profondeurMarges','$largeurMarges',
        '$topcolor','$bottomcolor','$rightcolor','$leftcolor')";
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$_SESSION['currentId'] = mysql_insert_id();
$id = $_SESSION['currentId'];

if($_SESSION['cle'] === "modifier"){
$newlogin = $_SESSION['newLogin'];
$newpassword= $_SESSION['newPassword'];

if ($newlogin != "" || $newlogin != NULL) {
    $sqlNewLogin = "UPDATE commandes SET login = '$newlogin' WHERE login='$login' AND password='$password'";
    $reqNewLogin = mysql_query($sqlNewLogin) or die('Erreur SQL !<br>' . $sqlNewLogin . '<br>' 
            . mysql_error());
    $login = $newlogin;
}

if ($newpassword != "" || $newpassword != NULL) {
    $sqlNewPassword = "UPDATE commandes SET password = '$newpassword' WHERE login='$login' AND password='$password'";
    $reqNewPassword = mysql_query($sqlNewPassword) or die('Erreur SQL !<br>' . $sqlNewPassword . '<br>' 
            . mysql_error());
}
mysql_close();
}
header("location:Facture.php");

