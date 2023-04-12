<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Note.php');
require_once(__DIR__ . '/../models/Save.php');

try {

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        $user = null;
    }

    // FICHIER CSS A CHARGER
    $css = CSS['catalog'];

    // RECUPERATION DU TYPE D'HISTOIRE
    $type = intval(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT));
    $theme = intval(filter_input(INPUT_GET, 'theme', FILTER_SANITIZE_NUMBER_INT));

    // VERIFICATION QUE LES PARAMETRES EXISTENT
    if (!$type) {
        header('location: /404.php');
        die;
    }

    // DETERMINE L'AFFICHAGE DU TITRE
    if ($type == 1 || $type == 2) {
        $h1 = CATALOG[$type];
        $titleDoc = CATALOG[$type];
    }

    $themeImg = 'themeAll';

    if ($type == 1) {
        $themeTitle = 'Plongez dans l\'univers d\'un récit linéaire et laissez votre imagination vous guider vers l\'inconnu.';
    } else {
        $themeTitle = 'Entrez dans une histoire où les choix que vous faites déterminent la suite des événements.';
    }


    if (!empty($theme)) {
        switch ($theme) {
            case '1':
                $themeImg = 'fantasticTheme';
                $themeTitle = 'Fantastique';
                break;
            case '2':
                $themeImg = 'scienceFictionTheme';
                $themeTitle = 'Science-Fiction';
                break;
            case '3':
                $themeImg = 'fantasyTheme';
                $themeTitle = 'Fantasy';
                break;
        }
    }


    // RECUPERE TOUTES LES HISTOIRES DU CATALOGUE CONCERNE
    if (empty($theme)) {
        $stories = Story::getAll($type);
    } else {
        $stories = Story::getAll($type, $theme);
    }

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}


// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/stories/catalog.php');

include_once(__DIR__ . '/../views/templates/footer.php');
