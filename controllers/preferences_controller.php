<?php

require_once(__DIR__ . '/../config/init.php');

try {

    // FICHIER CSS A CHARGER
    $css = CSS['account'];
    $css3 = CSS['form'];

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // RECUPERATION DES DONNEES ENVOYEES
        
    }

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}


// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/profil/preferences.php');

include_once(__DIR__ . '/../views/templates/footer.php');
