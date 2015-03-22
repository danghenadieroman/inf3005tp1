<?php
session_start();

$db = mysql_connect('localhost','root');
mysql_select_db('db_hd791183',$db);


$_SESSION['logins'] = $_POST['login'];


$login = $_SESSION['logins'];
$password = $_POST['password'];

$sql = "SELECT email FROM commandes WHERE `login` = '$login' and `password` = '$password'";


$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$data = mysql_fetch_assoc($req);
$arrlength = count($req);

if(!$data['email'] == NULL){
       $sqlInsertExistant = " INSERT INTO commandes (`login`, `password`, `telephone`, `adresse`,
        `email`,`dimentions`,`materiel`,`profondeurMarges`,`largeurMarges`,`topcolor`,`bottomcolor`,
        `rightcolor`,`leftcolor`)
        VALUES ('$login', '$password', NULL, NULL, NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
       $sqlInsertExistant = mysql_query($sqlInsertExistant) or die('Erreur SQL !<br>'.$sqlInsertExistant.'<br>'.mysql_error());
      
       $_SESSION['currentId'] = mysql_insert_id();
       $id = $_SESSION['currentId'];
       
    echo "Bienvenue ".$login."<br>";
    echo "Vous pouvez modifier les informations personnelles ou lesser les chaps vides ";
?>

<html>
<head>
 <title>Modification</title>
</head>
<body>
    <form action="Modifications.html" method="post"  enctype="multipart/form-data" >
     <input type="submit" name="envoi" value="Continuer" />
       </form>
    </body>
</html>

<?php

} else {
       $sqlInsert = " INSERT INTO commandes (`login`, `password`, `telephone`, `adresse`,
        `email`,`dimentions`,`materiel`,`profondeurMarges`,`largeurMarges`,`topcolor`,`bottomcolor`,
        `rightcolor`,`leftcolor`)
        VALUES ('$login', '$password', NULL, NULL, NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
       $reqInsert = mysql_query($sqlInsert) or die('Erreur SQL !<br>'.$sqlInsert.'<br>'.mysql_error());
       
       $_SESSION['currentId'] = mysql_insert_id();
       $id = $_SESSION['currentId'];
       
       header("location:PersonalInfo.html");
}

mysql_close();
?>