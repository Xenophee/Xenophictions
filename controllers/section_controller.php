<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Section.php');
require_once(__DIR__ . '/../models/Section_Section.php');

try {

    // RECUPERATION DE L'IDENTIFIANT DE SECTION, DU CHAPITRE ET DE L'HISTOIRE
    $idSection = intval(filter_input(INPUT_GET, 'section', FILTER_SANITIZE_NUMBER_INT));
    $story = intval(filter_input(INPUT_GET, 'story', FILTER_SANITIZE_NUMBER_INT));
    $chapter = intval(filter_input(INPUT_GET, 'chapter', FILTER_SANITIZE_NUMBER_INT));

    // VERIFICATION QUE LE PARAMETRE EXISTE
    // if (!$idSection || !$story || !$shapter) {
    //     header('location: /404.php');
    //     die;
    // }

    // FICHIER CSS A CHARGER
    $css = CSS['section'];

    $titleDoc = '';

    $informations = Chapter::get($story, $chapter);
    $section = Section::get($idSection);
    $sectionsChild = Section_Section::get($idSection);
    var_dump($sectionsChild);

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
