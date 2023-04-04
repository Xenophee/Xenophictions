<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Note.php');

try {
    // FICHIER CSS A CHARGER
    $css = CSS['catalog'];

    // RECUPERATION DU TYPE D'HISTOIRE
    $type = intval(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT));

    // DETERMINE L'AFFICHAGE DU TITRE
    if ($type == 1 || $type == 2) {
        $h1 = CATALOG[$type];
    }

    // RECUPERE TOUTES LES HISTOIRES DU CATALOGUE CONCERNE
    $stories = Story::getAll($type);

    

    // var_dump($stories);

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
