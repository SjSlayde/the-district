//ce lance au chargement de la page
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form'); //difinie le form dans une variable

form.addEventListener('submit', function (e) {//ce lance au moment ou l'utilisateur appuie sur envoyer
e.preventDefault();//stop l'envoi du form

let checkvalide = true; // si jamais la fonction verifiltre renvoie faux alors check valide sera faux
checkvalide &= verifiltre(/^[A-Za-z\s]+$/,document.getElementById("Nom"),"Nom invalide")
if(document.getElementById("Prenom")!=null){//regarde si la case prenom existe si elle n'est pas la passe a la ligne suivante
    checkvalide &= verifiltre(/^[A-Za-z]+$/,document.getElementById("Prenom"),"Prénom invalide")}
checkvalide &= verifiltre(/^[_A-Za-z0-9.-]+@[_a-z0-9.-]+.[a-z]{2,4}$/,document.getElementById("Email"),"veuillez entrer une adresse email valide")
checkvalide &= verifiltre( /^((\+|00)33\s?|0)[1-59](\s?\d{2}){4}$/,document.getElementById("Tel"),"numéros de téléphone invalide")
if(document.getElementById("Demande")!=null){
    checkvalide &= verifiltre(/^[A-Za-z\s]+$/,document.getElementById("Demande"),"veuillez ecrire votre demande")}
if(document.getElementById("adresse")!=null){
    checkvalide &= verifiltre(/^[A-Za-z0-9\s]+$/,document.getElementById("adresse"),"veuillez ecrire votre adresse")}
console.log(checkvalide)
if(checkvalide){
    form.submit();//si checkvalide est vraie alors envoie le form
}
})
})

function verifiltre(regex,element,mde){ //sert a applique les filtre regex sur les elements correspondant et mets un message d'erreur si renvoie faux
    if(!regex.test(element.value)){
        alert(mde);
        element.focus();
        return false;
    }
    return true;
}