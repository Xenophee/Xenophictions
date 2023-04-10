<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Save.php');
require_once(__DIR__ . '/../models/Chapter.php');


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
    $css = CSS['chapter'];

    $titleDoc = '';

    // RECUPERATION DE L'IDENTIFIANT DU CHAPITRE
    $story = intval(filter_input(INPUT_GET, 'story', FILTER_SANITIZE_NUMBER_INT));
    $chapter = intval(filter_input(INPUT_GET, 'chapter', FILTER_SANITIZE_NUMBER_INT));

    $informations = Chapter::get($story, $chapter);

    if (!is_null($user)) {
    $sections = Save::getAll($user->id_users, $chapter);
    }

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/stories/chapter.php');

include_once(__DIR__ . '/../views/templates/footer.php');
