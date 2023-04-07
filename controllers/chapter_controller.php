<?php

require_once(__DIR__ . '/../config/init.php');


try {
    // FICHIER CSS A CHARGER
    $css = CSS['chapter'];

    $titleDoc = '';

    // RECUPERATION DE L'IDENTIFIANT DU CHAPITRE
    $chapter = intval(filter_input(INPUT_GET, 'chapter', FILTER_SANITIZE_NUMBER_INT));

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
