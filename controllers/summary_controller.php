<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Section.php');
require_once(__DIR__ . '/../models/Note.php');
require_once(__DIR__ . '/../models/Save.php');
require_once(__DIR__ . '/../models/Comment.php');

try {

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        $user = null;
    }

    // RECUPERATION DE L'IDENTIFIANT DE L'HISTOIRE CONCERNEE
    $id = intval(filter_input(INPUT_GET, 'story', FILTER_SANITIZE_NUMBER_INT));

    // VERIFICATION QUE LE PARAMETRE EXISTE
    if (!$id) {
        header('location: /404.php');
        die;
    }

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


    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = [];

        if (isset($_POST['submitNote'])) {

            $note = intval(filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT));

            if ($note < 0 || $note > 10) {
                $errors['note'] = 'Veuillez saisir une note entre un et dix.';
            }

            if (empty($errors)) {

                $isNoteExist = Note::isNoteExist($user->id_users, $id);

                if (!$isNoteExist) {
                    $newNote = new Note;
                    $newNote->setNote($note);
                    $newNote->setId_Users($user->id_users);
                    $newNote->setId_stories($id);

                    $isNoteAdd = $newNote->add();
                } else {

                    $newNote = new Note;
                    $newNote->setNote($note);
                    $newNote->setId_Users($user->id_users);
                    $newNote->setId_stories($id);

                    $isNoteAdd = $newNote->update();
                }


                if ($isNoteAdd) {
                    Flash::setMessage('La note a été prise en compte.');
                } else {
                    Flash::setMessage('Une erreur est survenue : le note n\'a pas pu être enregistrée.');
                }
            }
        } else {

            $commentary = trim((string)filter_input(INPUT_POST, 'commentary', FILTER_SANITIZE_SPECIAL_CHARS));

            if (empty($commentary)) {
                $errors['commentary'] = 'Vous devez écrire un commentaire avant d\'envoyer.';
            }

            if (empty($errors)) {
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
        }
    }

    // RECUPERATION DES DONNEES DE L'HISTOIRE
    $story = Story::get($id);

    if (!is_null($user)) {
        $userNote = Note::get($user->id_users, $id);
    }

    $titleDoc = 'Sommaire : ' . $story->title;

    // DETERMINE SI C'EST LA DATE DE PUBLICATION OU D'ENREGISTREMENT A AFFICHER
    $date = (!is_null($story->published_at)) ? 'Publié le ' . date('d/m/Y', strtotime($story->published_at)) : 'Enregistré le ' . date('d/m/Y', strtotime($story->registered_at));


    // RECUPERATION DES CHAPITRES POUR LE SOMMAIRE
    $chapters = Chapter::getAll($id);

    // RECUPERATION DU PROLOGUE
    if (!empty($chapters)) {
        $firstChapter = $chapters[0];

        // VERIFICATION S'IL Y A BIEN DES CHAPITRES DANS L'HISTOIRE
        if (!is_null($firstChapter)) {
            $firstSection = Section::getFirstSection($firstChapter->id_chapters);
        }
    }


    // RECUPERATION DES COMMENTAIRES DE L'HISTOIRE
    $comments = Comment::getAll($id);

    // GESTION DE L'AFFICHAGE DE LA MOYENNE DES NOTES UTILISATEURS
    $note = (is_null($story->note)) ? '-' : ceil($story->note);

    // RECUPERATION DE LA SAUVEGARDE DE L'UTILISATEUR
    if (isset($user)) {
        $save = Save::get($user->id_users, $id);
    } else {
        $save = false;
    }
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
