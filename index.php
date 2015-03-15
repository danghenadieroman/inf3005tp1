<?php

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {


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
$img = '<img src="'.$nomImage.'" id = "monImage"/>';


$imgTmp = ImageCreateFromJpeg("$nomImage");
echo ImageSX($imgTmp);
$largeur = ImageSX($imgTmp);
echo "<br>";
echo ImageSY($imgTmp);
$hauteur = ImageSY($imgTmp);


$ratio = $largeur / $hauteur;
$hauteur1 = (500 / $ratio);
$hauteur2 = (800 / $ratio);
$hauteur3 = (1000 / $ratio);


//}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"/>
<script type="text/javascript" src="index.js"></script>
</head>
<body>
 
    <div id="photo">
        <?php echo $img; ?>
    </div>
    
<br />


Dimensions:
<select id="mySelect" onchange="sizeFunction()"> <br />
<option > </option> <br />
<option >13 x <?php echo (int)($hauteur1/37.79)  ?> cm</option> <br />
<option >21 x <?php echo (int)($hauteur2/37.79)  ?> cm</option> <br />
<option >26 x <?php echo (int)($hauteur3/37.79)  ?> cm</option> <br />
</select > <br />

<p id="demo"></p>

<script>

</script>
    
    


Type de materiel:
  <select id="frameType">
    <option value = "bois" >Bois</option>
    <option value = "metal" >Metal</option>
  </select>
        <br>
Profondeur des marges:
<select name="profondeur">
    <option value = "1">1 cm</option>
    <option value = "2" >2 cm</option>
    <option value = "3" >3 cm</option>
  </select>
        <br>
Largeur des marges:
<select id="largeurMarges" onchange="margeFunction()">
    <option > </option> <br />
    <option >1 cm</option>
    <option >2 cm</option>
    <option >3 cm</option>
  </select>
        <br>
 <p id="marges"></p>
<script>

</script>
        
Modele de cadre:
  <select id="framePart" onchange="frameFunction()">
    <option ></option>
    <option value = "top" >Haut</option>
    <option value = "rihgt" >Droit</option>
    <option value = "bottom" >Bas</option>
    <option value = "left" >Gauche</option>
  </select>
        <br>
        
<p id="frame"></p>

<script>

</script>



Couleur de cadre:
  <select id="frameColor" onchange="colorFunction()">
    <option ></option>
    <option value = "red" >Rouge</option>
    <option value = "black" >Noir</option>
    <option value = "brown" >Brun</option>
    <option value = "white" >Blanc</option>
    <option value = "blue" >Bleu</option>
  </select>

<p id="color"></p>


<script>

</script>
         <br>
   
<form action="final.php" method="post"  enctype="multipart/form-data" >
<input type="submit" name="terminer" value="Terminer" />
</form>
</body>
</html>


<?



?>