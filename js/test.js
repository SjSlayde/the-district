function redirection (cat){
    if(cat==1){
        window.location.href="category/asianfood.html"
    }
    if(cat==2){
        window.location.href="category/hamburger.html"
    }
    if(cat==3){
        window.location.href="category/pasta.html"
    }
    if(cat==4){
        window.location.href="category/pizza.html"
    }
    if(cat==5){
        window.location.href="category/salade.html"
    }
    if(cat==6){
        window.location.href="category/sandwich.html"
    }
    if(cat==7){
        window.location.href="category/veggie.html"
    }
    if(cat==8){
        window.location.href="category/wrap.html"
    }
}

function commande(plat){
    var platcommande = document.getElementById(plat)
    window.location.href="commande.html"
    document.getElementById('insertcommande').value += platcommande;
}