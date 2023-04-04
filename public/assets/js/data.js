const story = document.getElementById('story');
const chapterElement = document.getElementById('chapter');

// console.log('oui');

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


// --------------------------------------------------------------------------------------------------

const sectionsLink = document.getElementById('sectionsLink');

const getAllSections = (event) => {
    console.log('oui');
    let myInputs = new FormData(document.getElementById('formStories'));

    let options = {
        method: 'POST',
        body: myInputs
    }

    fetch('/controllers/ajax/getSectionsByChapters.php', options)
        .then(response => {
            console.log(response);
            return (response.json())
            
        })
        .then(sections => {
            console.log(sections);
            let sectionsHTML = '';
            sections.forEach(section => {
                let sectionsTitles = '';
                const sectionsTitlesArray = section.sections_titles.split('|');
                const sectionsIdArray = section.id_sections.split('|');
            
                sectionsIdArray.forEach((id, index) => {
                    const sectionTitle = sectionsTitlesArray[index];
                    // const isChecked = themeCategories && themeCategories.includes(parseInt(id));
                    sectionsTitles += `<div class="form-check d-flex align-items-center mb-4 mb-lg-2" id="sectionsLink">
                        <input class="form-check-input" type="checkbox" name="sectionsLink[]" value="${id}" id="${sectionTitle}" required ${isChecked ? 'checked' : ''}>
                        <label class="form-check-label ms-3" for="${sectionTitle}">{${id}} ${sectionTitle}</label>
                    </div>`;
                });
            
                sectionsHTML += `<div class="d-flex flex-column mt-4 mb-5 mx-5">
                    <h2 class="text-center mb-4">${section.chapters_titles}</h2>
                    ${sectionsTitles}
                  </div>`;
              });
        })
}

story.addEventListener('change', getAllSections)