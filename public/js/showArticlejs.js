//To add comment
function toComment() {

    document.querySelector('.commentsForm').addEventListener("submit", (e) => {
        e.preventDefault();
        
        let displayComment = document.querySelector('.displayComment>fieldset');
        let comment = document.getElementById('forComment').value;
        let commentLegend = document.getElementById('commentLegend');
        let forComment = document.getElementById('forComment');
    
        //Récuperer de façon automatique les entrées de notre formulaire
        //On passe en argument le formulaire
        let formData = new FormData(document.querySelector('.commentsForm'));
    
        //Instance de l'objet XMLHttpRequest
        let xml = new XMLHttpRequest();
    
        xml.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                let resp = this.response;
                let commentArray = [];
                //To have all data in an array so as to sort the data
                for (const key in resp) {
                    commentArray.push(resp[key]);
                }
                // To sort the preview array
                commentArray.reverse();
                
                if(comment) {
                    document.getElementById('forComment').value = "";
                    forComment.placeholder = 'Votre commentaire';
                    commentLegend.innerHTML = `Commentaires (${commentArray.length})`;
                    //To add comment                    
                    addComment(commentArray[0]);
                    // To delete a comment after adding
                    onBtn();
    
                } else {
                    forComment.placeholder = 'Veuillez saisir un texte !';
                }
    
            } else if(this.readyState == 4) {
                alert('erreur survenue... ');
            }
        }
    
        xml.open("POST", "/comments-controller/articleComment", true);
        //Response type
        xml.responseType = "json";
        //To pass all inputs values
        xml.send(formData);
    
        //To display the new comment (call onreadystatechange)
        function addComment(lastComment) {
            displayComment.innerHTML += 
    
            `
            <div class="showComment">
    
            <div>
            <div class="imgAndName">
                <p>
                    <img src="/assets/${lastComment.user_picture}" alt="avatar">
                </p>
                <h4>${lastComment.username}</h4>
                <p> ${((lastComment.create_at).split(' '))[0]} </p>
            </div>
            <p> ${lastComment.comment} </p>
            </div>
            <form id="deleteForm">
                <input type="hidden" name="commentId" value="${lastComment.id}">
                <input type="hidden" name="artID" value="${lastComment.article_id}">
                <button id="deleteCom" type="submit" name="deleteBtn">Supprimer</button>
            </form>
            </div>
            
            `
        }
        
    })

}
toComment();

//To delete a comment
function onBtn() {
    let deleteForm = document.querySelectorAll('#deleteForm');
    let commentLegend = document.getElementById('commentLegend');
    
    
    deleteForm.forEach(el => {
        el.addEventListener('submit', (e) => {
            e.preventDefault();
            //To remove the comment form the page
            el.parentElement.remove();
            
            //To get input values
            let formData = new FormData(el);

            //Instance of l'objet XMLHttpRequest
            let xmlrequest = new XMLHttpRequest();
            
            xmlrequest.onreadystatechange =  function() {
                if(this.readyState == 4 && this.status == 200) {
                    let resp = this.response;
                    let commentArray = [];
                    for (const key in resp) {
                        commentArray.push(resp[key]);
                    }
                    //To update the total comment automaticaly
                    commentLegend.innerHTML = `Commentaires (${commentArray.length})`;

                } else if (this.readyState == 4) {
                    exit('Erreur survenue...!');
                }
            }
            xmlrequest.open("POST", "/comments-controller/toDeletComment", true);
            //Response type
            xmlrequest.responseType = "json";
            //To pass all inputs values
            xmlrequest.send(formData);
        
        })
    })
}
onBtn();