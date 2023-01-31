// DOM variables declaration
document.addEventListener('DOMContentLoaded', function () {
    //CSS selectors
    let highfive = document.getElementById('highfive');
    

    /***************************************************************/
    /*************************  Functionalities  *******************/
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


});
