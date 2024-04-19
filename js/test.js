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

// function commande(plat){
//     var platcommande = document.getElementById(plat)
//     window.location.href="commande.html"
//     document.getElementById('insertcommande').value += platcommande;
// }
if(document.getElementById('insertbgimg')!=null){
    document.getElementById('insertbgimg').style.display="none"
    function commande(N) {
        const card = document.getElementsByClassName('block_text-img')
        for(var i=0;i<card.length;i++)
        {
            card[i].style.display='none';
        }
        const balisea = document.getElementsByClassName('btn-primary')
        for(var i=0;i<balisea.length;i++)
        {
            balisea[i].style.display='none';
        }
        const insertquantite = document.getElementsByClassName('insertquantité')
        const ChoixQuantité = document.getElementById("ChoixQuantité").innerHTML
        document.getElementById("ChoixQuantité").style.display="none"
        insertquantite[N-1].innerHTML= ChoixQuantité
        // document.getElementById('img-top').style.display="none"
        document.getElementById('boutonarmy').style.display="none"
        document.getElementById('insertbgimg').style.display="block"
        document.getElementById('insertcommande').innerHTML += document.getElementById('plat'+N).innerHTML
    }
}
    
{/* <div class="col-1" id="ChoixQuantité"><label for="quantite" class="labelt form-label">Quantité</label>
<select class="form-select " aria-label="Default select example">
<option value="0" selected>0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select></div> */}