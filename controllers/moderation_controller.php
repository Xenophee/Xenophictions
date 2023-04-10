<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Comment.php');

try {

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    // EXPULSION DES UTILISATEURS NON ADMIN
    if ($user->admin == false) {
        header('location: /404.php');
        die;
    }
    
    // FICHIER CSS A CHARGER
    $css = CSS['account'];
    $css2 = CSS['dashboard'];

    $titleDoc = 'Modération';

    // RECUPERATION DE TOUS LES COMMENTAIRES
    $comments = Comment::getAll();

    foreach ($comments as $comment) {
        if (is_null($comment->published_at)) {
            $unpublishedComments[] = $comment;
        }
    }


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