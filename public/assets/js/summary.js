
const navStory = document.querySelectorAll('.navStory');
const summary = document.getElementById('summary');
const comments = document.getElementById('comments');

const displayBlock = (event) => {
    
    navStory.forEach(element => {
        element.classList.remove('active');
    });
    event.target.classList.add('active');

    if (event.target == navStory[1]) {
        comments.classList.remove('d-none');
        summary.classList.add('d-none');
    } else {
        summary.classList.remove('d-none');
        comments.classList.add('d-none');
    }
}

navStory.forEach(element => {
    element.addEventListener('click', displayBlock)
})