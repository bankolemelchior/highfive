// DOM variables declaration
document.addEventListener('DOMContentLoaded', function () {
    //CSS selectors
    let nav = document.querySelector('.nav_logo');
    let navLiUl = document.querySelector('ul>li>ul');
    let btnCompte = document.querySelector('.btnCompte');
    let changeStatus = document.querySelectorAll('#changeStatus');
    let fa_bars = document.querySelector('.fa-bars');
    let navUl = document.querySelector('nav>ul');
    

    /***************************************************************/
    /*************************  Functionalities  *******************/
    /***************************************************************/

    
    function hambuger() {
        fa_bars.addEventListener('click', () => {
            navUl.classList.toggle('hamburger');
        })
    };
    hambuger();

/***************************************************************/

    //To add toggle function on account button
        btnCompte.addEventListener('click', () => {
            navLiUl.classList.toggle('monCompte');
        })

        
/***************************************************************/

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
