function sizeFunction() {
    var x = document.getElementById("mySelect");
    var i = x.selectedIndex;
    var largeur;
    var hauteur;
    if(i === 1){
        largeur = 500;
        hauteur = "<?php '500 / $ratio' ?>";
    }else if(i === 2){
        largeur = 800;
        hauteur = "<?php '800 / $ratio' ?>";
    }else if(i === 3){
        largeur = 1000;
        hauteur = "<?php '1000 / $ratio' ?>";
        }
    document.getElementById("demo").innerHTML = x.options[i].text;
    document.getElementById("monImage").width = largeur;
    document.getElementById("monImage").heigt = hauteur;
    
}

function margeFunction() {
    var x = document.getElementById("largeurMarges");
    var i = x.selectedIndex;
    document.getElementById("marges").innerHTML = x.options[i].text;
    var largeur;
    if(i === 1){
        largeur = "30px";
    }else if(i === 2){
        largeur = "60px";
    }else if(i === 3){
        largeur = "120px";
    }
   
    document.getElementById("monImage").style.borderWidth  = largeur;
    
}

function frameFunction() {
    var x = document.getElementById("framePart").value;
    document.getElementById("frame").innerHTML = x;
    if(x === "top"){
        document.getElementById("monImage").style.borderTopColor  = colorFunction();
    }else if(x === "bottom"){
        document.getElementById("monImage").style.borderBottomColor  = colorFunction();
    }else if(x === "rihgt"){
        document.getElementById("monImage").style.borderRightColor  = colorFunction();
    }else if(x === "left"){
        document.getElementById("monImage").style.borderLeftColor  = colorFunction();
    }
}

function colorFunction() {
    var x = document.getElementById("frameColor");
    var i = x.selectedIndex;
    document.getElementById("color").innerHTML = x.options[i].text;
    var color;
    if(i === 1){
        color = "red";
    }else if(i === 2){
        color = "black";
    }else if(i === 3){
        color = "brown";
    }else if(i === 4){
        color = "white";
    }else if(i === 5){
        color = "blue";
    }
   return color;
    
}


