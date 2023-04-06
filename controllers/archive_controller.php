<?php

require_once(__DIR__ . '/../config/init.php');

try {

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else {
        $user = $_SESSION['user'];
    }

    // EXPULSION DES NON INSCRITS
    if (empty($user)) {
        header('location: /404.php');
        die;
    }

    // FICHIERS CSS A CHARGER
    $css = CSS['account'];

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/profil/archive.php');

include_once(__DIR__ . '/../views/templates/footer.php');