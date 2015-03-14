<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$fichierTransmis = $_FILES['nomDuFichier']['name'];
//echo "Fichier transmis: ". $fichierTransmis. "<br />";
//echo "Sa taille : ". $_FILES['nomDuFichier']['size']. "<br />";
//echo "Son type : ". $_FILES['nomDuFichier']['type']. "<br />";
//echo "Fichier temporaire : ". $_FILES['nomDuFichier']['tmp_name']. "<br />";
//
//echo "Fichier transmis: ". $fichierTransmis. "<br />";
$fichierCharge= $_FILES['nomDuFichier']['tmp_name'];
$fichierCopie='C:\xampp\htdocs\LabNote2\images\img'.$_FILES['nomDuFichier']['name'];
if (!file_exists($fichierCopie)){
move_uploaded_file($fichierCharge,$fichierCopie);
echo "Stocke dans : ".$fichierCopie;
}else{ 
    echo "Ce fichier existe deja!";
}
echo "<br>";
$nomImage = "images/img".$fichierTransmis;
$img = '<img src="'.$nomImage.'" border="0"/>';


$imgTmp = ImageCreateFromJpeg("$nomImage");
//echo ImageSX($imgTmp);
$largeur = ImageSX($imgTmp);
echo "<br>";
//echo ImageSY($imgTmp);
$hauteur = ImageSY($imgTmp);


$ratio = $largeur / $hauteur;
$hauteur1 = (int)(500 / $ratio / 37.79);
$hauteur2 = (int)(800 / $ratio / 37.79);
$hauteur3 = (int)(1000 / $ratio / 37.79);


}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"/>
</head>
<body>
    
<br />
Dimensions:
<select > <br />
<option >13 x <?php echo $hauteur1 ?> cm</option> <br />
<option >21 x <?php echo $hauteur2 ?> cm</option> <br />
<option >26 x <?php echo $hauteur2 ?> cm</option> <br />
</select > <br />
    
    <div id="photo">
        <?php echo $img; ?>
    </div>

Grandeur des marges:
<select name="profondeur">
    <option value = "3" >3 cm</option>
    <option value = "4" >4 cm</option>
    <option value = "5" >5 cm</option>
  </select>
        <br>
Type de materiel:
  <select id="frameType">
    <option value = "Bois" >Bois</option>
    <option value = "Metal" >Metal</option>
  </select>
        <br>
        
Modele de cadre:
  <select id="frameSize">
    <option value = "Haut" >Haut</option>
    <option value = "Droit" >Droit</option>
    <option value = "Bas" >Bas</option>
    <option value = "Gauche" >Gauche</option>
  </select>
        <br>
Couleur de cadre:
  <select id="frameColor">
    <option value = "Rouge" >Rouge</option>
    <option value = "Noir" >Noir</option>
    <option value = "Brun" >Brun</option>
    <option value = "Blanc" >Blanc</option>
    <option value = "Bleu" >Bleu</option>
  </select>
         <br>
    
    
    
<form action="final.php" method="post"  enctype="multipart/form-data" >
<input type="submit" name="terminer" value="Terminer" />
</form>
</body>
</html>


<?



?>