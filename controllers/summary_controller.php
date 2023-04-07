<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Note.php');
require_once(__DIR__ . '/../models/Comment.php');

try {
    // FICHIER CSS A CHARGER
    $css = CSS['summary'];

    // FICHIER CSS A CHARGER
    $js = JS['summary'];

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }

    // RECUPERATION DE L'IDENTIFIANT DE L'HISTOIRE CONCERNEE
    $id = intval(filter_input(INPUT_GET, 'story', FILTER_SANITIZE_NUMBER_INT));

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $commentary = trim((string)filter_input(INPUT_POST, 'commentary', FILTER_SANITIZE_SPECIAL_CHARS));

        $newComment = new Comment;
        $newComment->setComment($commentary);
        $newComment->setId_stories($id);
        $newComment->setId_users($user->id_users);

        $isAdd = $newComment->add();

        if ($isAdd) {
            Flash::setMessage('Le commentaire a été envoyé et est en attente de validation.');
        } else {
            Flash::setMessage('Une erreur est survenue : le commentaire n\'a pas pu être envoyé.');
        }
    }

    // RECUPERATION DES DONNEES DE L'HISTOIRE
    $story = Story::get($id);

    $titleDoc = 'Sommaire : ' . $story->title;

    // DETERMINE SI C'EST LA DATE DE PUBLICATION OU D'ENREGISTREMENT A AFFICHER
    $date = (!is_null($story->published_at)) ? 'Publié le ' . date('d/m/Y', strtotime($story->published_at)) : 'Enregistré le ' . date('d/m/Y', strtotime($story->registered_at));


    // RECUPERATION DES CHAPITRES POUR LE SOMMAIRE
    $chapters = Chapter::getAll($id);

    // RECUPERATION DES COMMENTAIRES DE L'HISTOIRE
    $comments = Comment::getAll($id);
    // var_dump($comments);

    // GESTION DE L'AFFICHAGE DE LA MOYENNE DES NOTES UTILISATEURS
    $note = (is_null($story->note)) ? '-' : $story->note;

    // var_dump($story);

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}









// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/stories/summary.php');

include_once(__DIR__ . '/../views/templates/footer.php');
