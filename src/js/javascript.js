"use strict";

// permet de verifier si les champs son bien remplie
function validateForm(){
    var a = document.forms["formNewL"]["isbn"].value;
    var b = document.forms["formNewL"]["titre"].value;
    var c = document.forms["formNewL"]["annee"].value;
    var d = document.forms["formNewL"]["nbpages"].value;
    if (a == "") {
        // alert("Tapez un isbn valide");
        document.getElementById("isbn").style.borderColor = "red";
        document.getElementById("erreurISBN").innerHTML=" Il faut un isbn 10 Chef!!";
        document.getElementById("isbn").focus();
        return false;
    }else{
        document.getElementById("isbn").style.borderColor = "";
        document.getElementById("erreurISBN").innerHTML=" ";
    }
    if (b == "") {
        // alert("Pensez à taper un titre !");
        document.getElementById("titre").style.borderColor = "red";
        document.getElementById("erreurTITRE").innerHTML=" Il faut un titre Chef!!";
        document.getElementById("titre").focus();
        return false;
    }else{
        document.getElementById("titre").style.backgroundColor = "";
        document.getElementById("erreurTITRE").innerHTML=" ";
    }
    if (c == "" || c <= 1600 || c > 2020) {
        // alert("Pensez à taper une année, valide !");
        document.getElementById("annee").style.borderColor = "red";
        document.getElementById("erreurANNEE").innerHTML=" Il faut une année valide Chef!!";
        document.getElementById("annee").focus();
        return false;
    }else{
        document.getElementById("annee").style.backgroundColor = "";
        document.getElementById("erreurANNEE").innerHTML=" ";
    }
    if(d == "") {
        return true;
    }
    if (d < 4 || d > 500) {
        // alert("Pensez à entré un nombre de pages valide !");
        document.getElementById("nbpages").style.borderColor = "red";
        document.getElementById("erreurNBPAGES").innerHTML=" Il faut un nombre de pages > 5 Chef!!";
        document.getElementById("nbpages").focus();
        return false;
    }else{
        document.getElementById("nbpages").style.backgroundColor = "";
        document.getElementById("erreurNBPAGES").innerHTML=" ";
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