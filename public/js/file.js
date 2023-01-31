// DOM variables declaration
document.addEventListener('DOMContentLoaded', function () {
    //CSS selectors
    let nav = document.querySelector('.nav_logo');
    let navLiUl = document.querySelector('ul>li>ul');
    let btnCompte = document.querySelector('.btnCompte');
    let DevAstuce = document.querySelectorAll('.Dev-astuce');
    let Devsante = document.querySelectorAll('.Dev-Santé');
    let portrait = document.querySelectorAll('.Portrait');
    let changeStatus = document.querySelectorAll('#changeStatus');
    let btnCategorie = document.querySelectorAll('.btnCategorie');
    let fa_bars = document.querySelector('.fa-bars');
    let navUl = document.querySelector('nav>ul');
    let highfive = document.getElementById('highfive');
    let closeImage = document.querySelector('.closeImage');
    let modal = document.querySelector('.galerieModal');
    let theImage = document.querySelectorAll('#theImage');
    let forImg = document.querySelector('#forImg');
    

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
    //This close the modal
        // closeImage.addEventListener('click', () => {
        //     modal.style.display = 'none';
        // })

    /***************************************************************/
    
    function callInterval() {
        const university = 'HIGHFIVE';
        let index = 0;
        //This function display HIGHFIVE
        function displayUniversity() {
            highfive.style.visibility = 'visible';
            highfive.innerText += university[index];
            if(index === (university.length)-1) {
                clearInterval(forTimeInterval);
            }
            index++
        }
        let forTimeInterval = setInterval(displayUniversity, 300);
    }
    //To call callInterval after 4s
    setTimeout(callInterval, 4000);
    //To change the display to block
    function concateUniversity() {
        let univ = document.getElementById('university');
        univ.style.display = 'block';
    }
    //To call concateUniversity after 4s
    setTimeout(concateUniversity, 7000);


/***************************************************************/

    //This function sort the article according to the button
    btnCategorie.forEach(ele => {
        ele.addEventListener('click', () => {
            
            if(ele.textContent.includes("Dev-astuce")) {
                
                Devsante.forEach(element => {
                    element.parentElement.parentElement.style.display = 'none';
                    // element.parentElement.parentElement.classList.add('displayNone')
                });

                portrait.forEach(element => {
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

            }
                
        })

    })

/***************************************************************/

    function hambuger() {
        fa_bars.addEventListener('click', () => {

            navUl.classList.toggle('hamburger');
        })
    };
    hambuger();


    //To add toggle function on account button
        btnCompte.addEventListener('click', () => {
            navLiUl.classList.toggle('monCompte');
        })

        
        
        changeStatus.forEach(ele => {
        ele.addEventListener('click', () => {
            if(ele.textContent === 'Retirer') {
                confirm('Êtes vous sûr de ce action? Ce article ne sera pas disponible en ligne !');
            }else if (ele.textContent === 'Publier') {
                confirm('Êtes vous sûr de ce action? Ce article sera mis en ligne !');
            };
        })
    })

/***************************************************************/
    
    //THis code is about scroll event on the navbar
    window.addEventListener('scroll', () => {
        if(window.pageYOffset > 100) {
            nav.classList.add('sticky');
            // navUl.style.display = 'none';
        }else {
            nav.classList.remove('sticky');
        }
    })



});