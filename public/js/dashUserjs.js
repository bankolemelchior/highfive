document.addEventListener('DOMContentLoaded', () => {
   let deleteUser = document.querySelectorAll('#deleteUser');
   let deleteModal = document.querySelector('.deleteModal');
   let supprimer = document.querySelector('#supprimer');
   let cancel = document.querySelector('#cancel');


   deleteUser.forEach(el => {
    el.addEventListener('click', () => {
        // console.log("delete " +el.value);
        supprimer.setAttribute("value", el.value);
        // console.log("supprimer " +supprimer.value);
        // console.log(cancel);
        deleteModal.classList.add('deleteModalToggle');
        cancel.classList.remove('deleteModalToggle');
    })
   })
})