document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");
    var precedent = document.getElementById("precedent")
    var suivant = document.getElementById("suivant")
    
    // if(document.getElementById('pageveggie')==null){
        //     document.getElementById('page2').style.display='none'
        //     var page = 1 
        //     suivant.addEventListener('click',function suivant(){
            //         page++
            //         if (page > 2) {
                //             page = 1
                //         }
                //         pages(page)
                //     }
                // )
                
                // precedent.addEventListener('click',function precedent(){
                    //     page--
                    //     if ( page < 1) {
                        //         page = 2
                        //     }
                        //     pages(page)
                        // }
                        // )
                        // }
                        
                        // else if(document.getElementById('page1')==null){
                            var veggie=document.getElementById('pageveggie')
                            var hamburger = document.getElementById('pagehamburger')
                            var pasta = document.getElementById('pagepate')
                            var wrap = document.getElementById('pagewrap')
                            var pizza = document.getElementById('pagepizza')
                            var asianfood = document.getElementById('pageasian')
                            var page = 1 
                            if(document.getElementById("checkplathtml")!=null){
                            hamburger.style.display= 'none'
                            pasta.style.display= 'none'
                            wrap.style.display= 'none'
                            pizza.style.display= 'none'
                            asianfood.style.display='none'}
                            
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
                        // }
                        
                        
                        function pages(page){
                            // if( document.getElementById('pageveggie')==null){
    // if (page==1) {
        //     document.getElementById('page1').style.display= 'block'
        //     document.getElementById('page2').style.display= 'none'
        // }
        // else if(page==2) {
            //     document.getElementById('page1').style.display= 'none'
            //     document.getElementById('page2').style.display= 'block'
            //  }
            // }
            
            // else {
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
                // }
            });
            
            if(document.getElementById('insertbgimg')!=null){
                document.getElementById('insertbgimg').style.display="none"}
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
                    insertquantite[N].innerHTML= ChoixQuantité
                    // document.getElementById('img-top').style.display="none"
                    if(document.getElementById('boutonarmy')!=null){
                    document.getElementById('boutonarmy').style.display="none"}
                    document.getElementById('insertbgimg').style.display="block"
                    document.getElementById('insertcommande').innerHTML += card[N].innerHTML
                }
