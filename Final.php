<?php
echo "Payement!";
session_start();


$login = $_SESSION['logins'];
$id = $_SESSION['currentId'];

$db = mysql_connect('localhost','root');
mysql_select_db('db_hd791183',$db);

$dimentions = $_POST['dimentionSelect'];
$materiel = $_POST['frameType'];
$profondeurMarges = $_POST['profondeur'];
$largeurMarges = $_POST['largeurMarges'];
$modeleCadre = $_POST['framePart'];
$couleurCadre = $_POST['frameColor'];
$topcolor = $_POST['topcolor']; 
$bottomcolor = $_POST['bottomcolor']; 
$rightcolor = $_POST['rightcolor'];
$leftcolor = $_POST['leftcolor'];

$sql = "UPDATE commandes SET dimentions = '$dimentions', materiel = '$materiel', profondeurMarges = '$profondeurMarges',
        largeurMarges = '$largeurMarges', topcolor = '$topcolor', bottomcolor = '$bottomcolor', 
        rightcolor = '$rightcolor', leftcolor = '$leftcolor'  WHERE login='$login' and id = $id";

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

mysql_close();

