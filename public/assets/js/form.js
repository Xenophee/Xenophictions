// ----------------------------------------------------------------------------------------------
// VISUALISATION DE L'IMAGE DANS UN INPUT FILE

const coverInput = document.getElementById('cover');
const coverPreview = document.querySelector('.coverLandscape');

coverInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    console.log(file);
    if (file) {
    const reader = new FileReader();
    reader.addEventListener('load', function() {
        coverPreview.setAttribute('src', reader.result);
    });
    reader.readAsDataURL(file);
    }
});