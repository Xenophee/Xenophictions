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

// ---------------------------------------------------------------------------------------------------------



const sectionsLink = document.getElementById('sectionsLink');

const getAllSections = (event) => {
    console.log('oui');
    let myInputs = new FormData(document.getElementById('formStories'));

    let options = {
        method: 'POST',
        body: myInputs
    }



    fetch('/controllers/ajax/getSectionsByChapters.php', options)
  .then(response => response.json())
  
  .then(data => {
    console.log(data);
    data.forEach(chapter => {
        
        const chapterDiv = document.createElement('div');
        chapterDiv.classList.add('d-flex', 'flex-column', 'mt-4', 'mb-5', 'mx-5');
  
        const chapterTitle = document.createElement('h2');
        chapterTitle.classList.add('text-center', 'mb-4');
        chapterTitle.textContent = chapter.title;
  
        chapterDiv.appendChild(chapterTitle);
  
        chapter.sections.forEach(section => {
            const sectionDiv = document.createElement('div');
            sectionDiv.classList.add('form-check', 'd-flex', 'align-items-center', 'mb-4', 'mb-lg-2');
  
            const sectionInput = document.createElement('input');
            sectionInput.classList.add('form-check-input');
            sectionInput.type = 'checkbox';
            sectionInput.name = 'themeCategories[]';
            sectionInput.value = section.id_sections;
            sectionInput.id = section.title;
            sectionInput.required = true;

            const sectionLabel = document.createElement('label');
            sectionLabel.classList.add('form-check-label', 'ms-3');
            sectionLabel.htmlFor = section.title;
            sectionLabel.textContent = `${section.id_sections}. ${section.title}`;
    
            sectionDiv.appendChild(sectionInput);
            sectionDiv.appendChild(sectionLabel);
    
            chapterDiv.appendChild(sectionDiv);
        });
  

      sectionsLink.appendChild(chapterDiv);
    });
  })

}


story.addEventListener('change', getAllSections)
//   .catch(error => console.error(error));


//     fetch('/controllers/ajax/getSectionsByChapters.php', options)
//         .then(response => response.json())
//         .then(data => {
//             data.forEach(section => {

//                 while (sectionsLink.firstChild) {
//                     sectionsLink.removeChild(sectionsLink.firstChild);
//                 }

//                 const sectionDiv = document.createElement('div');
//                 sectionDiv.classList.add('d-flex', 'flex-column', 'mt-4', 'mb-5', 'mx-5');
//                 sectionsLink.appendChild(sectionDiv);

//                 const sectionTitle = document.createElement('h2');
//                 sectionTitle.classList.add('text-center', 'mb-4');
//                 sectionTitle.textContent = section.chapters_titles;
//                 sectionDiv.appendChild(sectionTitle);

//                 const sectionsTitles = section.sections_titles.split('|');
//                 console.log(sectionsTitles);
//                 const sectionsIds = section.id_sections.split('|');
//                 sectionsIds.forEach((sectionId, index) => {
//                     const sectionLabel = document.createElement('label');
//                     sectionLabel.classList.add('form-check-label', 'ms-3');
//                     sectionLabel.setAttribute('for', sectionsTitles[index]);
//                     sectionLabel.textContent = `{${sectionId}} ${sectionsTitles[index]}`;

//                     const sectionInput = document.createElement('input');
//                     sectionInput.classList.add('form-check-input');
//                     sectionInput.setAttribute('type', 'checkbox');
//                     sectionInput.setAttribute('name', 'sectionsLink[]');
//                     sectionInput.setAttribute('value', sectionId);
//                     sectionInput.setAttribute('id', sectionsTitles[index]);
//                     sectionInput.setAttribute('required', '');
//                     // if (themeCategories.includes(sectionId)) {
//                     //   sectionInput.setAttribute('checked', '');
//                     // }

//                     const sectionCheckboxDiv = document.createElement('div');
//                     sectionCheckboxDiv.classList.add('form-check', 'd-flex', 'align-items-center', 'mb-4', 'mb-lg-2');
//                     sectionCheckboxDiv.appendChild(sectionInput);
//                     sectionCheckboxDiv.appendChild(sectionLabel);

//                     sectionDiv.appendChild(sectionCheckboxDiv);
//                 });
//             });
//         })
//         .catch(error => console.error(error));
// }

// story.addEventListener('change', getAllSections)