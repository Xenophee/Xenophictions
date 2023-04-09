<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Section.php');
require_once(__DIR__ . '/../models/Section_Section.php');
require_once(__DIR__ . '/../models/Save.php');

try {

    // RECUPERATION DE L'IDENTIFIANT DE SECTION, DU CHAPITRE ET DE L'HISTOIRE
    $idSection = intval(filter_input(INPUT_GET, 'section', FILTER_SANITIZE_NUMBER_INT));
    $story = intval(filter_input(INPUT_GET, 'story', FILTER_SANITIZE_NUMBER_INT));
    $chapter = intval(filter_input(INPUT_GET, 'chapter', FILTER_SANITIZE_NUMBER_INT));
    $allSectionsId = $_SESSION['allSectionsId'] ?? [];
    $allSectionsId[] = $idSection;

    if (!in_array($idSection, $allSectionsId)) {
        $allSectionsId[] = $idSection;
    }

    if (end($allSectionsId) == $idSection) {
        array_pop($allSectionsId);
    }

    $_SESSION['allSectionsId'] = $allSectionsId;
    // $beforeLastSectionId = $allSectionsId[count($allSectionsId) - 2];
    // var_dump($beforeLastSectionId);
    var_dump($_SESSION['allSectionsId']);
    var_dump(end($_SESSION['allSectionsId']));

    if (count($allSectionsId) >= 2) {
        $previousSectionsId = array_slice($allSectionsId, 1);
        // var_dump($previousSectionId);
        $previousSectionId = end($previousSectionsId);
        // var_dump($previousSectionId);
    } else {
        $previousSectionId = null;
    }

    // VERIFICATION QUE LES PARAMETRES EXISTENT
    if (!$idSection || !$story || !$chapter) {
        header('location: /404.php');
        die;
    }

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    // FICHIER CSS A CHARGER
    $css = CSS['section'];

    $titleDoc = '';

    $informations = Chapter::get($story, $chapter);
    $section = Section::get($idSection);
    $sectionsChild = Section_Section::getSectionChild($idSection);
    $sectionsParent = Section_Section::getSectionParent($idSection);

    // $save = new Save;
    // $save->setId_users($user->id_users);
    // $save->setId_sections($sectionsParent->id_sections);

    // $allSectionsId[] = $idSection;
    
    
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
