<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Chapter.php');
require_once(__DIR__ . '/../models/Section.php');
require_once(__DIR__ . '/../models/Theme_Category.php');
require_once(__DIR__ . '/../models/Story_Category.php');
require_once(__DIR__ . '/../models/Section_Section.php');

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
    $css3 = CSS['form'];

    // FICHIER CSS A CHARGER
    $js = JS['form'];

    $titleDoc = 'Modifier une histoire';

    // RECUPERATION DES INFOS SUR L'HISTOIRE A MODIFIER
    $idStory = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));


    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = [];

        if (isset($_POST['storyForm'])) {

            // RECUPERATION DES DONNEES EN PROVENANCE DU FORMULAIRE SUR LES INFOS DE BASE DE L'HISTOIRE
            $title = trim((string)filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
            $author = trim((string)filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS));
            $type = intval(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT));
            $themeCategories = filter_input(INPUT_POST, 'themeCategories', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];
            $synopsis = trim((string)filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_SPECIAL_CHARS));

            // VERIFICATION SUR LE TITRE DE L'HISTOIRE
            if (empty($title)) {
                $errors['title'] = 'Veuillez saisir un titre';
            } else if (strlen($title) > 150) {
                $errors['title'] = 'Ce titre est trop long';
            }

            // VERIFICATION SUR LE TYPE
            if (empty($type)) {
                $errors['type'] = 'Veuillez saisir un type';
            } else if ($type != 1 && $type != 2) {
                $errors['type'] = 'Veuillez saisir correctement un type';
            }

            // VERIFICATION SUR LE RESUME
            if (empty($synopsis)) {
                $errors['synopsis'] = 'Veuillez saisir un synopsis';
            } else if (strlen($synopsis) > 1000) {
                $errors['synopsis'] = 'Ce synopsis est trop long';
            }

            // VERIFICATION SUR LES CATEGORIES
            if (empty($themeCategories)) {
                $errors['themeCategories'] = 'Veuillez choisir une ou plusieurs catégories';
            }


            // MODIFICATION DE L'HISTOIRE ET DE SES CATEGORIES SI TOUT EST BON
            if (empty($errors)) {

                $pdo = Database::getInstance();
                $pdo->beginTransaction();

                $addStory = new Story;
                $addStory->setTitle($title);
                $addStory->setAuthor($author);
                $addStory->setType($type);
                $addStory->setSynopsis($synopsis);

                $isAdd = $addStory->update($idStory);

                if (Story_Category::delete($idStory)) {

                    $isAddLink = [];

                    foreach ($themeCategories as $themeCategory) {
                        $storyCategoryAdd = new Story_Category;
                        $storyCategoryAdd->setIdStories($idStory);
                        $storyCategoryAdd->setIdCategories($themeCategory);
                        $isAddLink[] = $storyCategoryAdd->add();
                    }

                    if (isset($_FILES['cover'])) {
                        $cover = $_FILES['cover'];
                        if (!empty($cover['tmp_name'])) {
                            if ($cover['error'] > 0) {
                                $error['cover'] = 'Erreur survenue durant le transfert du fichier';
                            } else {
                                if (!in_array($cover['type'], AUTHORIZED_IMAGE_FORMAT)) {
                                    $error['cover'] = 'Ce type de fichier n\'est pas accepté';
                                } else if ($_FILES['cover']['size'] > MAX_FILE_SIZE) {
                                    $error['cover'] = 'Poids de l\'image trop élevé';
                                } else {
                                    $extension = pathinfo($cover['name'], PATHINFO_EXTENSION);
                                    $from = $cover['tmp_name'];
                                    $fileName = $idStory . '.' . $extension;
                                    $to = LOCATION_STORIES . $fileName;
                                    move_uploaded_file($from, $to);
                                }
                            }
                        }
                    }

                    if ($isAdd === true && !in_array(false, $isAddLink, true)) {
                        $pdo->commit();
                        Flash::setMessage('L\'histoire a été modifiée.');
                    } else {
                        $pdo->rollBack();
                        Flash::setMessage('Une erreur est survenue : l\'histoire n\'a pas été modifiée.');
                    }
                } else {
                    $pdo->rollBack();
                    Flash::setMessage('Une erreur est survenue : l\'histoire n\'a pas été modifiée.');
                }
            }

        } else {

            // RECUPERATION DES DONNEES EN PROVENANCE DU FORMULAIRE SUR LES CHAPITRES
            $chapterTitle = trim((string)filter_input(INPUT_POST, 'chapterTitle', FILTER_SANITIZE_SPECIAL_CHARS));
            $index = intval(filter_input(INPUT_POST, 'index', FILTER_SANITIZE_NUMBER_INT));
            $chapterId = intval(filter_input(INPUT_POST, 'chapterId', FILTER_SANITIZE_NUMBER_INT));

            // MISE A JOUR SI TOUT EST BON
            if (empty($errors)) {

                // MODIFICATION D'UN CHAPITRE
                if (!empty($chapterTitle) && !empty($chapterId)) {
                    $chapterUpdate = new Chapter;
                    $chapterUpdate->setId_chapters($chapterId);
                    $chapterUpdate->setTitle($chapterTitle);
                    $chapterUpdate->setIndex($index);
                    $chapterUpdate->setSummary('Un chapitre sans résumé');

                    $ischapterUpdate = $chapterUpdate->update($chapterId);

                    if ($ischapterUpdate) {
                        Flash::setMessage('Le chapitre a été mis à jour.');
                    } else {
                        Flash::setMessage('Une erreur est survenue : le chapitre n\'a pas été mis à jour.');
                    }
                }
            }
        }
    }

    // METHODES POUR RECUPERER LES DONNEES DES THEMES, DES CATEGORIES, DES CHAPITRES ET DES SECTIONS
    $themesCategories = Theme_Category::getAll();
    $story = Story::get($idStory);
    $chapters = Chapter::getAll($idStory);

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}


// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/dashboard/stories_update.php');

include_once(__DIR__ . '/../views/templates/footer.php');
