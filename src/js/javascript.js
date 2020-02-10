"use strict";

// permet de verifier si les champs son bien remplie
function validateForm(){ 
    var a = document.forms["myForm"]["isbn"].value;
    var b = document.forms["myForm"]["titre"].value;
    var c = document.forms["myForm"]["annee"].value;
    var d = document.forms["myForm"]["nbpages"].value;
    if (a == "") {
        alert("Tapez un isbn valide");
        return false;
    }
    else if (b == "") {
        alert("Pensez à taper un titre !");
        return false;
    }
    else if (c == "" || c < 1800 || c > 2020) {
        alert("Pensez à taper une année, valide !");
        return false;
    }
    else if (d == "" || d < 5 || d > 500) {
        alert("Pensez à entré un nombre de pages valide !");
        return false;
    }
};