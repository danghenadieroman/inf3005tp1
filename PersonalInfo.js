
function validateForm() {

    var telephone = document.getElementById("telephone").value;
    if (telephone == null || telephone == "") {
        alert("Le champs " + "Numero de telephone" + " doit etre remplis!");
        return false;
    }

    var adresse = document.getElementById("adresse").value;
    if (adresse == null || adresse == "") {
        alert("Le champs " + "Adresse" + " doit etre remplis!");
        return false;
    }

    var email = document.getElementById("email").value;
    if (email == null || email == "") {
        alert("Le champs " + "Courriel" + " doit etre remplis!");
        return false;
    }


    var photo = document.getElementById("nomDuFichier").value;
    if (photo == null || photo == "") {
        alert("Un photo doit etre fournie!");
        return false;
    }
}

function validateChamps() {

    var login = document.getElementById("login").value;
    if (login == null || login == "") {
        alert("Le champs " + "Nom d’usager" + " doit etre remplis!");
        return false;
    }

    var password = document.getElementById("password").value;
    if (password == null || password == "") {
        alert("Le champs " + "Mot de passe" + " doit etre remplis!");
        return false;
    }

}