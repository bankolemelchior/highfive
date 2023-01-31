// DOM variables declaration
document.addEventListener('DOMContentLoaded', function () {
    //CSS selectors
    let closeImage = document.querySelector('.closeImage');
    let modal = document.querySelector('.galerieModal');
    let theImage = document.querySelectorAll('#theImage');
    let forImg = document.querySelector('#forImg');
    let likeTag = document.querySelectorAll('#like');
    

    /***************************************************************/
    /*************************  Functionalities  *******************/
    /***************************************************************/
    //The function is about creating (opening) modal for images on the galerie page
    function galerieModal() {
        theImage.forEach(el => {
            el.addEventListener('click', () => {
                modal.style.display = 'block';
                forImg.src = el.src;
            })
        })

    }
    galerieModal();
    // This close the modal
        closeImage.addEventListener('click', () => {
            modal.style.display = 'none';
        })


    /***************************************************************/

    function toLike() {
        likeTag.forEach(el => {

            el.addEventListener('submit', (e) => {
                e.preventDefault();
                let likeBtn = document.querySelectorAll("#likeBtn");
                
                
            //Récuperer de façon automatique les entrées de notre formulaire
            //On passe en argument le formulaire
            let dataForm = new FormData(el);
    
            //Instance de l'objet XMLHttpRequest
            let xml = new XMLHttpRequest();
    
        xml.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                let resp = this.response;

                console.log(resp);
                //To update like numuber
                el.lastElementChild.textContent = `je kiff (${resp})`;
            } else if(this.readyState == 4) {
                alert('erreur survenue... ');
            }
        }
    
        xml.open("POST", "/LikeDislikeController/likes", true);
        //Format de reponse
        xml.responseType = "json";
        //Pour préciser le type de paramètre à passer
        // xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
        xml.send(dataForm);
        
        })
    })
    
    }

    toLike();



});
