var precedent = document.getElementById("precedent")
var suivant = document.getElementById("suivant") //definie les bouton Precedent et suivant

document.getElementById('page2').style.display='none' //fait disparaitre la page 2
var page = 1 //compteur de page

suivant.addEventListener('click',function suivant(){
    page++
    if (page > 2) {
        page = 1
    }
    pages(page)
}
)//fait tourner le carousel avec Suivant

precedent.addEventListener('click',function precedent(){
    page--
    if ( page < 1) {
        page = 2
    }
    pages(page)
}
)//fait tourner le carousel avec Precedent

function pages(page){//fonctionne pour afficher la page en fonction du compteur
if (page==1) {
    document.getElementById('page1').style.display= 'block'
    document.getElementById('page2').style.display= 'none'
}
else if(page==2) {
    document.getElementById('page1').style.display= 'none'
    document.getElementById('page2').style.display= 'block'
 }
}

function categoriered (page){//ne sert pas c'etait un test pour rediriger faire le carousel a la bonne page 
    window.location.href="../plat.html"
pages(page)
}