<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/User.php');


try {

    // EXPULSION DES UTILISATEURS NON ADMIN
    if ($_SESSION['user']->admin == false) {
        header('location: /404.php');
        die;
    }

    // FICHIERS CSS A CHARGER
    $css = CSS['account'];
    $css2 = CSS['dashboard'];
    $css3 = CSS['form'];

    // RECUPERATION DE L'IDENTIFIANT UTILISATEUR
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    
    // METHODE DE RECUPERATION DES DONNEES DE L'UTILISATEUR CONCERNE
    $user = User::get($id);

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/dashboard/user_informations.php');

include_once(__DIR__ . '/../views/templates/footer.php');
