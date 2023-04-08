<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Section.php');
require_once(__DIR__ . '/../models/Chapter_Section.php');
require_once(__DIR__ . '/../models/Section_Section.php');

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

    // FICHIER JS A CHARGER
    $js = JS['data'];

    $titleDoc = 'Ajouter une section';

    // METHODES POUR AFFICHER LES DONNEES DES HISTOIRES
    $stories = Story::getAll();

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['continue'])) {

            // RECUPERATION DES DONNEES ENVOYEES
            $_SESSION['story'] = intval(filter_input(INPUT_POST, 'story', FILTER_SANITIZE_NUMBER_INT));
            $_SESSION['chapter'] = intval(filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_INT));
            $_SESSION['title'] = trim((string)filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
            $_SESSION['description'] = trim((string)filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
            $_SESSION['content'] = trim((string)filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));

            // VERIFICATION QU'UNE HISTOIRE A ETE SELECTIONNEE
            if (empty($_SESSION['story'])) {
                $errors['story'] = 'Veuillez choisir l\'histoire de référence';
            }

            // VERIFICATION QU'UN CHAPITRE A ETE SELECTIONNE
            if (empty($_SESSION['chapter'])) {
                $errors['chapter'] = 'Veuillez choisir le chapitre de référence';
            }

            // VERIFICATION QU'UN TITRE A ETE SELECTIONNE
            if (empty($_SESSION['title'])) {
                $errors['title'] = 'Veuillez saisir un titre de section';
            } else if (strlen($_SESSION['title']) > 150) {
                $errors['title'] = 'Le titre est trop long';
            }

            // VERIFICATION QU'UNE DESCRIPTION A ETE ENTREE
            if (empty($_SESSION['description'])) {
                $errors['description'] = 'Veuillez saisir une description de section';
            } else if (strlen($_SESSION['description']) > 250) {
                $errors['description'] = 'La description est trop longue';
            }

            // VERIFICATION QU'UN CONTENU A ETE ENTREE
            if (empty($_SESSION['content'])) {
                $errors['content'] = 'Veuillez saisir le contenu de la section';
            }

        } else {

            // RECUPERATION DES DONNEES ENVOYEES
            $sectionsLink = filter_input(INPUT_POST, 'sectionsLink', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];
            $none = intval(filter_input(INPUT_POST, 'none', FILTER_SANITIZE_NUMBER_INT));

            // VERIFICATION QU'UNE OU PLUSIEURS SECTIONS PARENTES ONT ETE CHOISIES
            if (empty($sectionsLink) && empty($none)) {
                $errors['section'] = 'Veuillez choisir la section de référence ou préciser qu\'il n\'y en a pas';
            }

            // AJOUT DE LA SECTION EN BASE SI TOUT EST BON
            if (empty($errors)) {

                $pdo = Database::getInstance();
                $pdo->beginTransaction();

                // AJOUT DE LA SECTION EN BASE
                $addSection = new Section;
                $addSection->setTitle($_SESSION['title']);
                $addSection->setDescription($_SESSION['description']);
                $addSection->setContent($_SESSION['content']);

                $isAdd = $addSection->add();

                $idSection = $pdo->lastInsertId();

                // AJOUT DU LIEN CHAPITRE / SECTION A LA BASE
                $addLinkChapterSection = new Chapter_Section;
                $addLinkChapterSection->setId_chapters($_SESSION['chapter']);
                $addLinkChapterSection->setId_sections($idSection);

                $isAddLink = $addLinkChapterSection->add();

                // AJOUT DU LIEN SECTION / SECTION A LA BASE
                if (!empty($sectionsLink)) {
                    foreach ($sectionsLink as $sectionLink) {
                        $addSectionSection = new Section_Section;
                        $addSectionSection->setId_sections_parent($sectionLink);
                        $addSectionSection->setId_sections_child($idSection);
                        $isAddLinkSection[] = $addSectionSection->add();
                    }
                } else {
                    $addSectionSection = new Section_Section;
                    // $addSectionSection->setId_sections_parent($sectionLink);
                    $addSectionSection->setId_sections_child($idSection);
                    $isAddLinkSection[] = $addSectionSection->add();
                }
                

                if ($isAdd == true && $isAddLink == true && !in_array(false, $isAddLinkSection, true)) {
                    $pdo->commit();
                    Flash::setMessage('Le section a été ajoutée.');
                } else {
                    $pdo->rollBack();
                    Flash::setMessage('Une erreur est survenue : la section n\'a pas été ajoutée.');
                }
            }

            header('location: /controllers/sections_add_controller.php');
            die;
        }

        $chapters = Chapter::getAll($_SESSION['story']);
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
