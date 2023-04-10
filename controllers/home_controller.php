<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');

try {

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    // FICHIER CSS A CHARGER
    $css = CSS['home'];

    $titleDoc = 'Accueil';

    $lastPublication = Story::getLastPublish();
    $mostPopular = Story::getMostPopular();

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/home.php');

include_once(__DIR__ . '/../views/templates/footer.php');