const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const userForm = document.getElementById('userForm');
const passwordMessage = document.querySelectorAll('.password');


const passwordVerification =  (event) => {
    event.preventDefault();

    if (password.value != confirmPassword.value) {
        passwordMessage.forEach(element => {
            element.textContent = 'Les mots de passe ne sont pas identiques.'
        });
    } else {
        userForm.submit();
    }
}


userForm.addEventListener('submit', passwordVerification);


