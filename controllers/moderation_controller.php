<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Comment.php');

try {

    // EXPULSION DES UTILISATEURS NON ADMIN
    if ($_SESSION['user']->admin == false) {
        header('location: /404.php');
        die;
    }
    
    // FICHIER CSS A CHARGER
    $css = CSS['account'];
    $css2 = CSS['dashboard'];

    // RECUPERATION DE TOUS LES COMMENTAIRES
    $comments = Comment::getAll();

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}



// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/dashboard/moderation.php');

include_once(__DIR__ . '/../views/templates/footer.php');