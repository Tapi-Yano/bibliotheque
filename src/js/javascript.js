"use strict";

// permet de verifier si les champs son bien remplie
function validateForm(){ 
    var a = document.forms["myForm"]["isbn"].value;
    var b = document.forms["myForm"]["titre"].value;
    var c = document.forms["myForm"]["annee"].value;
    var d = document.forms["myForm"]["nbpages"].value;
    if (a == "") {
        alert("Tapez un isbn valide");
        document.getElementById("isbn").style.borderColor = "orange";
        document.getElementById("isbn").focus();
        return false;
    }
    else if (b == "") {
        alert("Pensez à taper un titre !");
        document.getElementById("titre").style.borderColor = "orange";
        document.getElementById("titre").focus();
        return false;
    }
    else if (c == "" || c <= 1600 || c > 2020) {
        alert("Pensez à taper une année, valide !");
        document.getElementById("annee").style.borderColor = "orange";
        document.getElementById("annee").focus();
        return false;
    }
    else if (d == "" || d < 5 || d > 500) {
        alert("Pensez à entré un nombre de pages valide !");
        document.getElementById("nbpages").style.borderColor = "orange";
        document.getElementById("nbpages").focus();
        return false;
    }
};