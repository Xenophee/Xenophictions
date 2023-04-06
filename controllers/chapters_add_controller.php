<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Chapter.php');

try {

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    // EXPULSION DES UTILISATEURS NON ADMIN
    if ($user->admin == false) {
        header('location: /404.php');
        die;
    }

    // FICHIER CSS A CHARGER
    $css = CSS['account'];
    $css2 = CSS['dashboard'];
    $css3 = CSS['form'];

    // METHODES POUR AFFICHER LES DONNEES DES HISTOIRES
    $stories = Story::getAll();

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // RECUPERATION DES DONNEES ENVOYEES
        $story = intval(filter_input(INPUT_POST, 'story', FILTER_SANITIZE_NUMBER_INT));
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        $index = intval(filter_input(INPUT_POST, 'index', FILTER_SANITIZE_NUMBER_INT));
        $summary = trim(filter_input(INPUT_POST, 'summary', FILTER_SANITIZE_SPECIAL_CHARS));

        
        if (empty($title)) {
            $errors['title'] = 'Veuillez saisir un titre de chapitre';
        } else if (strlen($title) > 150) {
            $errors['title'] = 'Le titre est trop long';
        }

        if ($index == 0) {
            $errors['index'] = 'Veuillez saisir un index';
        }

        if (empty($summary)) {
            $errors['summary'] = 'Veuillez saisir un résumé de chapitre';
        }

        if (empty($errors)) {
            $addChapter = new Chapter;
            $addChapter->setTitle($title);
            $addChapter->setIndex($index);
            $addChapter->setSummary($summary);
            $addChapter->setId_stories($story);

            $isAdd = $addChapter->add();

            if ($isAdd === true) {
                Flash::setMessage('Le chapitre a été ajoutée.');
            } else {
                Flash::setMessage('Une erreur est survenue : le chapitre n\'a pas été ajoutée.');
            }
        }
    }

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}


// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/dashboard/chapters_add.php');

include_once(__DIR__ . '/../views/templates/footer.php');
