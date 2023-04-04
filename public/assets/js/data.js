const story = document.getElementById('story');
const chapterElement = document.getElementById('chapter');

console.log('oui');

const getChapters = () => {

    let myInputs = new FormData(document.getElementById('formStories'));

    let options = {
        method: 'POST',
        body: myInputs
    }

    fetch('/controllers/ajax/getChaptersByStory.php', options)
        .then(response => {
            return (response.json())
        })
        .then(chapters => {
            chapterElement.innerHTML = '<option>-</option>';
            chapters.forEach(chapter => {
                chapterElement.innerHTML += `<option value="${chapter.id_chapters}">${chapter.title}</option>`
            });
        })
}

getChapters();

story.addEventListener('change', getChapters);