"use strict";

// var isbn = document.getElementById("isbn");
// var titre = document.getElementById("titre");
// var annee = document.getElementById("annee");
// var nbpages = document.getElementById("nbpages");

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
    else if (c == "") {
        alert("Pensez à taper une année valide !");
        return false;
    }
    else if (d == "") {
        alert("Pensez à entré un nombre de pages valide !");
        return false;
    }
};