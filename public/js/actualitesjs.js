// DOM variables declaration
document.addEventListener('DOMContentLoaded', function () {
    //CSS selectors
    let DevAstuce = document.querySelectorAll('.Dev-astuce');
    let Devsante = document.querySelectorAll('.Dev-Santé');
    let portrait = document.querySelectorAll('.Portrait');
    let evenement = document.querySelectorAll('.Evenement');
    let btnCategorie = document.querySelectorAll('.btnCategorie');
    

    /***************************************************************/
    /*************************  Functionalities  *******************/
    /***************************************************************/
  

    //This function sort the article according to the button
    btnCategorie.forEach(ele => {
        ele.addEventListener('click', () => {
            
            if(ele.textContent.includes("Dev-astuce")) {
                
                Devsante.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
                });

                portrait.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
                    
                });

                evenement.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
    
                });

                DevAstuce.forEach(element => {
                    element.parentElement.parentElement.style.display = 'block';
                    
                });    


            }

            if(ele.textContent.includes("Dev-Santé")) {

                DevAstuce.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
    
                });

                portrait.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
                    
                });

                evenement.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
    
                });

                Devsante.forEach(element => {
                    element.parentElement.parentElement.style.display = 'block';
                    
                });
                

            }


            if(ele.textContent.includes("Portrait")) {

                portrait.forEach(element => {
                    element.parentElement.parentElement.style.display = 'block';
    
                });

                Devsante.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
                    
                });
                
                DevAstuce.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
                    
                });

                evenement.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
    
                });

            }

            if(ele.textContent.includes("Evenement")) {

                evenement.forEach(element => {
                    element.parentElement.parentElement.style.display = 'block';
    
                });

                portrait.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
    
                });

                Devsante.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
                    
                });
                
                DevAstuce.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
                    
                });

            }

            if(ele.textContent.includes("All")) {

                portrait.forEach(element => {
                    element.parentElement.parentElement.style.display = 'block';
    
                });

                Devsante.forEach(element => {
                    element.parentElement.parentElement.style.display = 'block';
                    
                });
                
                DevAstuce.forEach(element => {
                    element.parentElement.parentElement.style.display = 'block';
                    
                });

                evenement.forEach(element => {
                    element.parentElement.parentElement.style.display = 'block';
    
                });

            }
                
        })

    })

});