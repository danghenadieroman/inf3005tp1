function sizeFunction() {
    var x = document.getElementById("mySelect");
    var i = x.selectedIndex;
    var largeur;
    var hauteur;
    if (i === 1) {
        largeur = 500;
        hauteur = "<?php '500 / $ratio' ?>";
    } else if (i === 2) {
        largeur = 800;
        hauteur = "<?php '800 / $ratio' ?>";
    } else if (i === 3) {
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
    if (i === 1) {
        largeur = "30px";
    } else if (i === 2) {
        largeur = "60px";
    } else if (i === 3) {
        largeur = "120px";
    }

    document.getElementById("monImage").style.borderWidth = largeur;

}

var sidecolor;
var scolor;

function frameFunction() {
    var value = document.getElementById("framePart").value;
    document.getElementById("frame").innerHTML = value;
    if (value === "top") {
        document.getElementById("monImage").style.borderTopColor = colorFunction();
        document.getElementById("topcolor").value = "top".concat(colorFunction());
    } else if (value === "bottom") {
        document.getElementById("monImage").style.borderBottomColor = colorFunction();
        document.getElementById("bottomcolor").value = "bottom".concat(colorFunction());
    } else if (value === "right") {
        document.getElementById("monImage").style.borderRightColor = colorFunction();
        document.getElementById("rightcolor").value = "right".concat(colorFunction());
    } else if (value === "left") {
        document.getElementById("monImage").style.borderLeftColor = colorFunction();
        document.getElementById("leftcolor").value = "left".concat(colorFunction());
    }

}

function colorFunction() {
    var x = document.getElementById("frameColor");
    var i = x.selectedIndex;
    document.getElementById("color").innerHTML = x.options[i].text;
    var color;
    if (i === 1) {
        color = "red";
    } else if (i === 2) {
        color = "black";
    } else if (i === 3) {
        color = "brown";
    } else if (i === 4) {
        color = "white";
    } else if (i === 5) {
        color = "blue";
    }

    return color;

}

//function myFunction() {
//    document.getElementById("topcolor").innerHTML = "Paragraph changed!";
//}

function materielFunction() {
    var value = document.getElementById("frameType").value;
    document.getElementById("materiel").innerHTML = value;
    if (value === "metal") {
        document.getElementById("monImage").style.borderColor = "lightgray";
    } else {
        document.getElementById("monImage").style.borderColor = "burlywood";
    }
}

function validateDimentions() {

    var dimentions = document.getElementById("mySelect").value;
    if (dimentions == null || dimentions == "") {
        alert("Vous devez choisir les dimentions!");
        return false;
    }
}

function profondeurFunction() {
    var value = document.getElementById("profondeur").value;
    document.getElementById("profondeurMarges").innerHTML = value;
    if (value === "1cm") {
        document.getElementById("monImage").style.boxShadow = "10px 10px 5px #888888";
    } else if (value === "2cm") {
        document.getElementById("monImage").style.boxShadow = "20px 20px 5px #888888";
    } else if (value === "3cm") {
        document.getElementById("monImage").style.boxShadow = "30px 30px 5px #888888";
    }
}

