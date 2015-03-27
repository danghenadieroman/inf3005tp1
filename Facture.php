<?php
session_start();
echo date("Y/m/d");
$db = mysql_connect('localhost', 'root');
mysql_select_db('db_hd791183', $db);

$id = $_SESSION['currentId'];

$sql = "SELECT * FROM commandes WHERE id = '$id'";
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$data = mysql_fetch_assoc($req);
                
$to = $_SESSION['emails'];
echo $to;
$subject = "HTML email";


$source_file = $_SESSION['fichierCopie'];

if(exif_imagetype($source_file) == IMAGETYPE_PNG){
     $im = imagecreatefrompng($source_file);

   if($im && imagefilter($im, IMG_FILTER_GRAYSCALE)){
      echo 'Image convertie en grayscale.';
     imagepng($im, 'image.png');
     $image = 'image.png';
   }
   else{
      echo 'La conversion en grayscale a échoué.';
   }
      imagedestroy($im);

}else{
     $im = imagecreatefromjpeg($source_file);

    if($im && imagefilter($im, IMG_FILTER_GRAYSCALE)){
       echo 'Image convertie en grayscale.';
       imagejpeg($im,'image.jpeg');
       $image = 'image.jpeg';
    }
    else{
       echo 'La conversion en grayscale a échoué.';
    }
       imagedestroy($im);
}


$facture =" 
<html>
    <head>
        <title>Facture</title>
    </head>
    <body>
        
            <table >
                <tr>
                    <th>login</th><th>password</th><th>telephone</th><th>adresse</th><th>email</th>
                    <th>dimentions</th><th>materiel</th><th>profondeurMarges</th><th>largeurMarges</th><th>topcolor</th>
                    <th>bottomcolor</th><th>rightcolor</th><th>leftcolor</th>
            </tr>".'<tr><td>' . $data['login'] . '</td>'.
                   '<tr><td>' . $data['login'] . '</td>'.
                   '<td>' . $data['password'] . '</td>'.
                   '<td>' . $data['telephone'] . '</td>'.
                   '<td>' . $data['adresse'] . '</td>'.
                   '<td>' . $data['email'] . '</td>'.
                   '<td>' . $data['dimentions'] . '</td>'.
                   '<td>' . $data['materiel'] . '</td>'.
                   '<td>' . $data['profondeurMarges'] . '</td>'.
                   '<td>' . $data['largeurMarges'] . '</td>'.
                   '<td>' . $data['topcolor'] . '</td>'.
                   '<td>' . $data['bottomcolor'] . '</td>'.
                   '<td>' . $data['rightcolor'] . '</td>'.
                   '<td>' . $data['leftcolor'] . '</td>' . '</tr>'."
            </table>

       '<img src=' . $image . '/>'
    </body>
</html>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

 mysql_close();
$mail_sent = @mail( $to, $subject, $facture, $headers );
echo $mail_sent ? "La facture a été envoyé" : "Erreur!";
       
        ?>

