<?php
echo "Payement!";
session_start();

$id = $_SESSION['currentId'];
$login = $_SESSION['logins'];
$password = $_SESSION['passwords'];
$telephone = $_SESSION['telephones'];
$adresse = $_SESSION['adresses'];
$email = $_SESSION['emails'];

$db = mysql_connect('localhost','root');
mysql_select_db('db_hd791183',$db);

$dimentions = $_POST['dimentionSelect'];
$materiel = $_POST['frameType'];
$profondeurMarges = $_POST['profondeur'];
$largeurMarges = $_POST['largeurMarges'];
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

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

mysql_close();

