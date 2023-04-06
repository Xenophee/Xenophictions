

// ----------------------------------------------------------------------------------------------
// CREATION DU LIEN VERS LE CONTROLLER DE SUPPRESSION

const deleteBtns = document.querySelectorAll('.delete');
const deleteLink = document.getElementById('deleteLink');


const createLink = (event) => {
    let id = event.target.dataset.id;
    let deleteParam = event.target.dataset.deleteparam;
    deleteLink.setAttribute('href', 'delete_controller.php?id=' + id + '&delete=' + deleteParam);
}

deleteBtns.forEach(element => {
    element.addEventListener('click', createLink)
});