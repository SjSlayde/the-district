//Ce Lance au chargement de la page
document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");
    var precedent = document.getElementById("precedent")
    var suivant = document.getElementById("suivant")//definie les bouton Precedent et suivant
    

                            var veggie=document.getElementById('pageveggie')
                            var hamburger = document.getElementById('pagehamburger')
                            var pasta = document.getElementById('pagepate')
                            var wrap = document.getElementById('pagewrap')
                            var pizza = document.getElementById('pagepizza')
                            var asianfood = document.getElementById('pageasian')
                            var page = 1 //Compteur de Page pour le carousel
                            if(document.getElementById("checkplathtml")!=null){
                            hamburger.style.display= 'none'
                            pasta.style.display= 'none'
                            wrap.style.display= 'none'
                            pizza.style.display= 'none'
                            asianfood.style.display='none'}//definie et desactive tout les cellule sauf la premiere si checkplat existe
                            
                            suivant.addEventListener('click',function suivant(){
                                page++
                                if (page > 6) {
                                    page = 1
                                }
                                pages(page)
                            })//fait tourner le carousel avec Suivant
                        
                        precedent.addEventListener('click',function precedent(){
                            page--
                            if ( page < 1) {
                                page = 6
                            }
                            pages(page)
                        })//fait tourner le carousel avec Precedent
                        
                        
                        function pages(page){ //fonctionne pour afficher la page en fonction du compteur
  
                            veggie.style.display= 'none'
                            hamburger.style.display= 'none'
                            pasta.style.display= 'none'
                            wrap.style.display= 'none'
                            pizza.style.display= 'none'
                            asianfood.style.display='none'

                if (page==1) {
                    veggie.style.display= 'block'
                }
                if (page==2) {
                    hamburger.style.display= 'block'
                }
                if (page==3) {
                    pasta.style.display= 'block'
                }
                if (page==4) {
                    wrap.style.display='block'
                }
                if (page==5) {
                    pizza.style.display='block'
                }
                if (page==6) {
                    asianfood.style.display='block'
                }}
            });
            
            if(document.getElementById('insertbgimg')!=null){ //regade si insert insertbgimg existe et la fait diparaitre pour la faire faire apparaitre plus tard
            document.getElementById('insertbgimg').style.display="none"}
            function commande(N) { //fait apparaitre le formulaire quand l'utilisateur clique sur commander 
                    
                if(document.getElementById("Titre")!=null){
                    document.getElementById("Titre").style.display="none" //fait disparaitre le titre h1
                }
                    const card = document.getElementsByClassName('card') // mets dans un tableau toute mes div plat/card
                    
                    for(var i=0;i<card.length;i++)// fait disparaitre toute les cards
                    {
                        card[i].style.display='none';
                    }
                    
                    const balisea = document.getElementsByClassName('btn-primary')//mets dans un tableau tout les bouton
                    
                    for(var i=0;i<balisea.length;i++)//fait disparaitre tout les bouton commander
                    {
                        balisea[i].style.display='none';
                    }
                    
                    const insertquantite = document.getElementsByClassName('insertquantité') //mets dans un tableau tout les <span> avec la class isertquantité pour le injecter le menu deroulant 
                    const ChoixQuantité = document.getElementById("ChoixQuantité").innerHTML // enregistre dans une variable le menu dreoulant
                    document.getElementById("ChoixQuantité").style.display="none"//fait disparaitre le menu deroulant
                    insertquantite[N].innerHTML= ChoixQuantité //insert le menu deroulant dans le <Span> du plat correspondant 
                    // document.getElementById('img-top').style.display="none"
                    if(document.getElementById('boutonarmy')!=null){
                    document.getElementById('boutonarmy').style.display="none"}//regard si les bouton du carousel sont la et les desactives 

                    document.getElementById('insertbgimg').style.display="block"// fait apparaitre le formulaire
                    document.getElementById('insertcommande').innerHTML += card[N].innerHTML //insert le plat dans le formulaire dans la div insertcommande
                }
