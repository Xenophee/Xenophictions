<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');
require_once(__DIR__ . '/../models/Story_Category.php');
require_once(__DIR__ . '/../models/Theme_Category.php');

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

    $titleDoc = 'Ajouter une histoire';

    // METHODES POUR RECUPERER LES DONNEES DES THEMES ET DES CATEGORIES
    $themesCategories = Theme_Category::getAll();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = [];

        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS));
        $type = intval(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT));
        $themeCategories = filter_input(INPUT_POST, 'themeCategories', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];
        $synopsis = trim(filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_SPECIAL_CHARS));


        if (empty($title)) {
            $errors['title'] = 'Veuillez saisir un titre';
        } else if (strlen($title) > 150) {
            $errors['title'] = 'Ce titre est trop long';
        }

        if (empty($type)) {
            $errors['type'] = 'Veuillez saisir un type';
        } else if ($type !=1 && $type !=2) {
            $errors['type'] = 'Veuillez saisir correctement un type';
        }

        if (empty($synopsis)) {
            $errors['synopsis'] = 'Veuillez saisir un synopsis';
        } else if (strlen($synopsis) > 1000) {
            $errors['synopsis'] = 'Ce synopsis est trop long';
        }

        if (empty($themeCategories)) {
            $errors['themeCategories'] = 'Veuillez choisir une ou plusieurs catégories';
        }


        if (empty($errors)) {

            $pdo = Database::getInstance();
            $pdo->beginTransaction();

            $addStory = new Story;
            $addStory->setTitle($title);
            $addStory->setType($type);
            $addStory->setSynopsis($synopsis);

            $isAdd = $addStory->add();

            $idStory = $pdo->lastInsertId();

            foreach($themeCategories as $themeCategory) {
                $storyCategoryAdd = new Story_Category;
                $storyCategoryAdd->setIdStories($idStory);
                $storyCategoryAdd->setIdCategories($themeCategory);
                $isAddLink[] = $storyCategoryAdd->add();
            }

            if (isset($_FILES['cover'])) {
                $cover = $_FILES['cover'];
                if (!empty($cover['tmp_name'])) {
                    if ($cover['error'] == 4) {
                        $error['cover'] = 'Image obligatoire';
                    } else if ($cover['error'] > 0) {
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
                Flash::setMessage('L\'histoire a été ajoutée.');
            } else {
                $pdo->rollBack();
                Flash::setMessage('Une erreur est survenue : l\'histoire n\'a pas été ajoutée.');
            }
        }
    }

    // $js = '<script src="../../public/assets/js/tinymce.js"></script>';

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}


// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/dashboard/stories_add.php');

include_once(__DIR__ . '/../views/templates/footer.php');
