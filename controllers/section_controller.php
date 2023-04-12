<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Section.php');
require_once(__DIR__ . '/../models/Section_Section.php');
require_once(__DIR__ . '/../models/Save.php');

try {

    // RECUPERATION DE L'IDENTIFIANT DE SECTION, DU CHAPITRE ET DE L'HISTOIRE
    $idSection = intval(filter_input(INPUT_GET, 'section', FILTER_SANITIZE_NUMBER_INT));

    // VERIFICATION QUE LES PARAMETRES EXISTENT
    if (empty($idSection)) {
        header('location: /404.php');
        die;
    }

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        $user = null;
    }

    // RECUPERATION DES INFORMATIONS SUR LA SECTION EN COURS
    $section = Section::get($idSection);

    // RECUPERATION DE L'IDENTIFIANT DU PROLOGUE, SEULE SECTION AUTORISEE PAR DEFAUT
    $permission = Chapter::getPrologue($section->id_stories);

    // EJECTION DES NON INSCRIT SI L'ID DE SECTION EST DIFFERENT DU PROLOGUE
    if (is_null($user) && $idSection != $permission->id_sections) {
        header('location: /404.php');
        die;
    }

    // SI L'UTILISATEUR EXISTE ET QUE L'ID DE SECTION EST DIFFERENT DE CELUI DU PROLOGUE, ON VERIFIE DANS LA SAUVEGARDE
    if (!is_null($user) && $idSection != $permission->id_sections) {
        $sectionsParent = Section_Section::getSectionsParent($idSection);
        foreach ($sectionsParent as $sectionParent) {
            $verificationSecond[] = Save::isSaveExist($sectionParent->id_sections);
        }
        
        // S'IL N'Y A PAS DE SAUVEGARDE SUR UNE SECTION PARENTE, ON EXPULSE L'UTILISATEUR
        if (!in_array(true, $verificationSecond, true)) {
            Flash::setMessage('Vous n\'avez pas accès à cette section pour le moment');
            header('location: /controllers/summary_controller.php?story=' . $section->id_stories);
            die;
        }
    }

    // FICHIER CSS A CHARGER
    $css = CSS['section'];

    // RECUPERATION DES INFORMATIONS POUR ACCEDER A LA SECTION SUIVANTE
    $sectionsChild = Section_Section::getSectionsChild($idSection);
    var_dump($sectionsChild);

    foreach($sectionsChild as $sectionChild) {
        $result[] = Save::isSaveExist($sectionChild->id_sections);
    }

    // TITRE DU DOCUMENT
    $titleDoc = 'Section du ' . $section->chapter_title;

    // SAUVEGARDE DE LA PROGRESSION DES UTILISATEURS
    if (!is_null($user)) {
        $save = new Save;
        $save->setId_users($user->id_users);
        $save->setId_sections($idSection);
        $isAdded = $save->add();
    }

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/stories/section.php');

include_once(__DIR__ . '/../views/templates/footer.php');
