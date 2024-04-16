document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form');

form.addEventListener('submit', function (e) {
e.preventDefault();
let checkvalide = true;
checkvalide &= verifiltre(/^[A-Za-z]+$/,document.getElementById("Nom"),"Nom invalide")
if(document.getElementById("Prenom")!=null){
checkvalide &= verifiltre(/^[A-Za-z]+$/,document.getElementById("Prenom"),"Prénom invalide")}
checkvalide &= verifiltre(/^[_A-Za-z0-9.-]+@[_a-z0-9.-]+.[a-z]{2,4}$/,document.getElementById("Email"),"veuillez entrer une adresse email valide")
checkvalide &= verifiltre(/^[0-9{10}]+$/,document.getElementById("Tel"),"numéros de téléphone invalide")
checkvalide &= verifiltre(/^[A-Za-z]+$/,document.getElementById("Demande"),"veuillez ecrire votre demande")
console.log(checkvalide)
if(checkvalide){
    form.submit();
    console.log("ça passe")
}
})
})

function verifiltre(regex,element,mde){
    if(!regex.test(element.value)){
        alert(mde);
        element.focus();
        return false;
    }
    return true;
}