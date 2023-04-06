<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
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

    // RECUPERATION DE L'IDENTIFIANT A SUPPRIMER ET DU TYPE DE SUPPRESSION
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $publish = intval(filter_input(INPUT_GET, 'publish', FILTER_SANITIZE_NUMBER_INT));

    switch ($publish) {
        case '1':
            // PUBLICATION D'UNE HISTOIRE
            $isPublished = Story::publish($id);
            if ($isPublished) {
                Flash::setMessage(PUBLICATION['STORY_PUBLISHED']);
            } else {
                Flash::setMessage(PUBLICATION['STORY_NOT_PUBLISHED']);
            }
            break;
        case '2':
            // PUBLICATION DU COMMENTAIRE
            $isPublished = Comment::publish($id);
            if ($isPublished) {
                Flash::setMessage(PUBLICATION['COMMENT_PUBLISHED']);
            } else {
                Flash::setMessage(PUBLICATION['COMMENT_NOT_PUBLISHED']);
            }
            break;
    }

    // REDIRECTION VERS LA PAGE PRECEDENTE
    header('location: ' . $_SERVER['HTTP_REFERER']);
    die;

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}
