// MISE EN PLACE DE TINYMCE
tinymce.init({
    selector: '.tinymce',
    height: 500,
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    content_css: '/public/assets/css/form.css',
    mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
        },
        {
            value: 'Email',
            title: 'Email'
        },
    ]
});

let btn = document.getElementById('btn');
let zipCodeELement = document.getElementById('zipCodeElement');

const getTime = () => {

    if(zipCodeELement.value.length == 5) {
        // Pour de l'envoi en get
        // fetch('/controllers/ajax/getTime.php?zipCode=' + zipCodeELement.value)

        let myInputs = new FormData(document.getElementById('myForm'));

        let options = {
            method: 'POST',
            body: myInputs
        }

        fetch('/controllers/ajax/getTime.php', options)
        .then(response => {
            console.log(response);
            return(response.json())
        })
        .then(data => {
            // On vide le innerHTML ici pour éviter la répétition
            cityElement.innerHTML = '<option>Veuillez saisir une ville</option>';
            cities.forEach(city => {
                cityElement.innerHTML += `<option value="${city.codeCommune}">${city.nomCommune}</option>`
            });
            console.log(data);
            let time = document.getElementById('time');
            time.innerHTML = data;
            // Dans un foreach sur un tableau pour afficher :
            studentsElement.innerHTML += `<li>${student}</li>`
        })
    }
    
}

// Utiliser keyup plutôt que blur afin d'éviter le temps de chargement
zipCodeELement.addEventListener('keyup', getTime);

// On peut appeler la fonction ici pour qu'elle charge une première fois quand on arrive sur la page

// Regarder dans Network, cliquer sur le fichier et ensuite sur l'onglet preview