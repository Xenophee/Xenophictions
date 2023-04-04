<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Section.php');
require_once(__DIR__ . '/../models/Chapter_Section.php');
require_once(__DIR__ . '/../models/Section_Section.php');

try {

    // EXPULSION DES UTILISATEURS NON ADMIN
    if ($_SESSION['user']->admin == false) {
        header('location: /404.php');
        die;
    }

    // FICHIER CSS A CHARGER
    $css = CSS['account'];
    $css2 = CSS['dashboard'];
    $css3 = CSS['form'];

    // FICHIER JS A CHARGER
    $js = JS['data'];

    // METHODES POUR AFFICHER LES DONNEES DES HISTOIRES
    $stories = Story::getAll();
    // $sections = Section::getAll();

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // RECUPERATION DES DONNEES ENVOYEES
        $story = intval(filter_input(INPUT_POST, 'story', FILTER_SANITIZE_NUMBER_INT));
        $chapter = intval(filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_INT));
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        $description = intval(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
        $section = intval(filter_input(INPUT_POST, 'section', FILTER_SANITIZE_NUMBER_INT));
        
        // VERIFICATION QU'UNE HISTOIRE A ETE SELECTIONNEE
        if (empty($story)) {
            $errors['story'] = 'Veuillez choisir l\'histoire de référence';
        }

        // VERIFICATION QU'UN CHAPITRE A ETE SELECTIONNE
        if (empty($chapter)) {
            $errors['chapter'] = 'Veuillez choisir le chapitre de référence';
        }

        // VERIFICATION QU'UN TITRE A ETE SELECTIONNE
        if (empty($title)) {
            $errors['title'] = 'Veuillez saisir un titre de section';
        } else if (strlen($title) > 150) {
            $errors['title'] = 'Le titre est trop long';
        }

        // VERIFICATION QU'UNE DESCRIPTION A ETE ENTREE
        if (empty($description)) {
            $errors['description'] = 'Veuillez saisir une description de section';
        } else if (strlen($description) > 250) {
            $errors['description'] = 'La description est trop longue';
        }

        // VERIFICATION QU'UN CONTENU A ETE ENTREE
        if (empty($content)) {
            $errors['content'] = 'Veuillez saisir le contenu de la section';
        }

        // VERIFICATION QU'UNE OU PLUSIEURS SECTIONS PARENTES ONT ETE CHOISIES
        if (empty($section)) {
            $errors['section'] = 'Veuillez choisir la section de référence';
        }

        // AJOUT DE LA SECTION EN BASE SI TOUT EST BON
        if (empty($errors)) {

            $pdo = Database::getInstance();
            $pdo->beginTransaction();

            // AJOUT DE LA SECTION EN BASE
            $addSection = new Section;
            $addSection->setTitle($title);
            $addSection->setDescription($description);
            $addSection->setContent($content);

            $isAdd = $addSection->add();

            $idSection = $pdo->lastInsertId();

            // AJOUT DU LIEN CHAPITRE / SECTION A LA BASE
            $addLinkChapterSection = new Chapter_Section;
            $addLinkChapterSection->setId_chapters($chapter);
            $addLinkChapterSection->setId_sections($idSection);

            $isAddLink = $addLinkChapterSection->add();

            // AJOUT DU LIEN SECTION / SECTION A LA BASE
            $addSectionSection = new Section_Section;
            $addSectionSection->setId_sections_parent($idParentSection);
            $addSectionSection->setId_sections_child($idSection);

            $isAddSectionSection = $addSectionSection->add();

            if ($isAdd == true && $isAddLink == true && $isAddSectionSection == true) {
                $pdo->commit();
                Flash::setMessage('Le section a été ajoutée.');
            } else {
                $pdo->rollBack();
                Flash::setMessage('Une erreur est survenue : la section n\'a pas été ajoutée.');
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

include(__DIR__ . '/../views/dashboard/sections_add.php');

include_once(__DIR__ . '/../views/templates/footer.php');
