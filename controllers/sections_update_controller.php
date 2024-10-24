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
    $js = JS['dataSections'];

    $titleDoc = 'Modifier une section';

    // RECUPERATION DE L'IDENTIFIANT DE SECTION, DE CHAPITRE ET D'HISTOIRE
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $idChapter = intval(filter_input(INPUT_GET, 'chapter', FILTER_SANITIZE_NUMBER_INT));
    $idStory = intval(filter_input(INPUT_GET, 'story', FILTER_SANITIZE_NUMBER_INT));
    

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // RECUPERATION DES DONNEES ENVOYEES
        $chapter = intval(filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_INT));
        $title = trim((string)filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        $description = trim((string)filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        $content = trim((string)filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
        $sectionsLink = filter_input(INPUT_POST, 'sectionsLink', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];
        $none = intval(filter_input(INPUT_POST, 'none', FILTER_SANITIZE_NUMBER_INT));

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
        if (empty($sectionsLink) && empty($none)) {
            $errors['section'] = 'Veuillez choisir la section de référence ou préciser qu\'il n\'y en a pas';
        }

        // AJOUT DE LA SECTION EN BASE SI TOUT EST BON
        if (empty($errors)) {

            $pdo = Database::getInstance();
            $pdo->beginTransaction();

            // MODIFICATION DE LA SECTION EN BASE
            $updateSection = new Section;
            $updateSection->setTitle($title);
            $updateSection->setDescription($description);
            $updateSection->setContent($content);

            $isUpdate = $updateSection->update($id);
            
            // SUPPRESSION DES LIEN ENTRE LA SECTION EN COURS ET LE CHAPITRE
            $isDeletedLink = Chapter_Section::delete($id);

            // AJOUT DU NOUVEAU LIEN CHAPITRE / SECTION A LA BASE
            $addLinkChapterSection = new Chapter_Section;
            $addLinkChapterSection->setId_chapters($chapter);
            $addLinkChapterSection->setId_sections($id);
            
            $isAddLink = $addLinkChapterSection->add();

            // SUPPRESSION DES LIENS ENTRE LA SECTION EN COURS ET LES AUTRES
            $isDeleted = Section_Section::delete($id);

            // AJOUT DU LIEN SECTION / SECTION A LA BASE
            if (!empty($sectionsLink)) {
                foreach ($sectionsLink as $sectionLink) {
                    $addSectionSection = new Section_Section;
                    $addSectionSection->setId_sections_parent($sectionLink);
                    $addSectionSection->setId_sections_child($id);
                    $isAddLinkSection[] = $addSectionSection->add();
                }
            } else {
                $addSectionSection = new Section_Section;
                // $addSectionSection->setId_sections_parent($sectionLink);
                $addSectionSection->setId_sections_child($id);
                $isAddLinkSection[] = $addSectionSection->add();
            }

            if ($isUpdate === true && $isAddLink === true && $isDeletedLink === true && $isDeleted === true && !in_array(false, $isAddLinkSection, true)) {
                $pdo->commit();
                Flash::setMessage('La section a été mise à jour.');
            } else {
                $pdo->rollBack();
                Flash::setMessage('Une erreur est survenue : la section n\'a pas été mise à jour.');
            }
        }
    }

    // RECUPERATION DES INFOS SUR LA SECTION EN COURS ET SES LIENS
    $section = Section::get($id);
    $chapters = Chapter::getAll($idStory);
    $sectionsLink = Section_Section::getAll($id);

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}


// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/dashboard/sections_update.php');

include_once(__DIR__ . '/../views/templates/footer.php');
