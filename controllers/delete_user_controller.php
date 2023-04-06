<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Note.php');
require_once(__DIR__ . '/../models/Comment.php');



try {

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    // EXPULSION DES NON INSCRIT
    if (empty($user)) {
        header('location: /404.php');
        die;
    }

    // RECUPERATION DE L'IDENTIFIANT A SUPPRIMER ET DU TYPE DE SUPPRESSION
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $delete = intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT));

    switch ($delete) {
        case '1':
            // SUPPRESSION D'UN UTILISATEUR
            if ($user->id_users == $id) {
                $isDeleted = User::delete($id);
                if ($isDeleted) {
                    Flash::setMessage(CODE[0]);
                } else {
                    Flash::setMessage(CODE[1]);
                }
                header('location: /controllers/deconnection_controller.php');
                die;
            }
            break;
        case '2':
            // SUPPRESSION D'UNE COMMENTAIRE
            $isDeleted = Category::delete($id);
            if ($isDeleted) {
                Flash::setMessage(CODE[2]);
            } else {
                Flash::setMessage(CODE[3]);
            }
            break;
        case '3':
            // SUPPRESSION D'UNE NOTE
            $isDeletedFirst = Theme::deleteAll($id);
            $isDeletedSecond = Theme::delete($id);
            if ($isDeletedSecond) {
                Flash::setMessage(CODE[4]);
            } else {
                Flash::setMessage(CODE[5]);
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