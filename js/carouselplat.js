var precedent = document.getElementById("precedent")//toutes mes div
var suivant = document.getElementById("suivant")
var veggie=document.getElementById('pageveggie')
var hamburger = document.getElementById('pagehamburger')
var pasta = document.getElementById('pagepate')
var wrap = document.getElementById('pagewrap')
var pizza = document.getElementById('pagepizza')
var page = 1 
hamburger.style.display= 'none'
pasta.style.display= 'none'
wrap.style.display= 'none'
pizza.style.display= 'none'

suivant.addEventListener('click',function suivant(){
    page++
    if (page > 5) {
        page = 1
    }
    pages(page)
}
)

precedent.addEventListener('click',function precedent(){
    page--
    if ( page < 1) {
        page = 5
    }
    pages(page)
})

function pages(page){
if (page==1) {
    veggie.style.display= 'block'
    hamburger.style.display= 'none'
    pizza.style.display='none'
}
if (page==2) {
    veggie.style.display= 'none'
    hamburger.style.display= 'block'
    pasta.style.display= 'none'
}
if (page==3) {
    hamburger.style.display= 'none'
    pasta.style.display= 'block'
    wrap.style.display= 'none'
}
if (page==4) {
    pasta.style.display='none'
    wrap.style.display='block'
    pizza.style.display='none'
}
if (page==5) {
    veggie.style.display= 'none'
    wrap.style.display='none'
    pizza.style.display='block'
}}