"use strict";

// permet de verifier si les champs son bien remplie
function validateForm(){
    var a = document.forms["formNewL"]["isbn"].value;
    var b = document.forms["formNewL"]["titre"].value;
    var c = document.forms["formNewL"]["annee"].value;
    var d = document.forms["formNewL"]["nbpages"].value;
    if (a == "") {
        // alert("Tapez un isbn valide");
        document.getElementById("isbn").style.backgroundColor = "red";
        document.getElementsByClassName("erreur").innerHTML="Il faut un isbn 10 Chef!!";
        document.getElementById("isbn").focus();
        return false;
    }else{
        document.getElementById("isbn").style.backgroundColor = "";
    }
    if (b == "") {
        // alert("Pensez à taper un titre !");
        document.getElementById("titre").style.backgroundColor = "red";
        document.getElementById("titre").focus();
        document.getElementsByClassName("erreur").innerHTML="Il faut un titre Chef!!";
        return false;
    }else{
        document.getElementById("titre").style.backgroundColor = "";
    }
    if (c == "" || c <= 1600 || c > 2020) {
        // alert("Pensez à taper une année, valide !");
        document.getElementById("annee").style.backgroundColor = "red";
        document.getElementById("annee").focus();
        document.getElementsByClassName("erreur").innerHTML="Il faut une année valide Chef!!";
        return false;
    }else{
        document.getElementById("annee").style.backgroundColor = "";
    }
    if(d == "") {
        return true;
    }
    if (d < 4 || d > 500) {
        // alert("Pensez à entré un nombre de pages valide !");
        document.getElementById("nbpages").focus();
        document.getElementsByClassName("erreur").innerHTML="Il faut un nombre de pages > 5 Chef!!";
        return false;
    }
}

var repondre;
function delete_livre(){
    repondre = confirm('Confirmer suppression ?');
    if(repondre == true){
        return true;
    }else{
        return false;
    }
}