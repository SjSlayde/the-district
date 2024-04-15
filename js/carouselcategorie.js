var precedent = document.getElementById("precedent")
var suivant = document.getElementById("suivant")
document.getElementById('page2').style.display='none'
var page = 1 

suivant.addEventListener('click',function suivant(){
    page++
    if (page > 2) {
        page = 1
    }
    pages(page)
}
)

precedent.addEventListener('click',function precedent(){
    page--
    if ( page < 1) {
        page = 2
    }
    pages(page)
}
)

function pages(page){
if (page==1) {
    document.getElementById('page1').style.display= 'block'
    document.getElementById('page2').style.display= 'none'
}
else if(page==2) {
    document.getElementById('page1').style.display= 'none'
    document.getElementById('page2').style.display= 'block'
 }
}