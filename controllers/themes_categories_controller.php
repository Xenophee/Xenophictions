<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Theme.php');
require_once(__DIR__ . '/../models/Category.php');
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

    $titleDoc = 'Thèmes & catégories';

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $error = [];

        // DONNEES EN PROVENANCE POUR L'AJOUT
        $newTheme = trim((string)filter_input(INPUT_POST, 'newTheme', FILTER_SANITIZE_SPECIAL_CHARS));
        $parentTheme = intval(filter_input(INPUT_POST, 'parentTheme', FILTER_SANITIZE_NUMBER_INT));
        $newCategory = trim((string)filter_input(INPUT_POST, 'newCategory', FILTER_SANITIZE_SPECIAL_CHARS));

        // DONNEES EN PROVENANCE POUR LA MODIFICATION
        $theme = trim((string)filter_input(INPUT_POST, 'theme', FILTER_SANITIZE_SPECIAL_CHARS));
        $themeId = intval(filter_input(INPUT_POST, 'themeId', FILTER_SANITIZE_NUMBER_INT));
        $category = trim((string)filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS));
        $categoryId = intval(filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT));


        // ---------------------------------------------------------------------------------------------------------
        // MODIFICATION D'UNE CATEGORIE
        if (!empty($category) && !empty($categoryId)) {
            $categoryUpdate = new Category;
            $categoryUpdate->setId($categoryId);
            $categoryUpdate->setName($category);
            $categoryUpdate->setDescription('Une catégorie sans résumé');

            $isCategoryUpdate = $categoryUpdate->update($categoryId);

            if ($isCategoryUpdate) {
                Flash::setMessage('La catégorie a été mise à jour.');
            } else {
                Flash::setMessage('Une erreur est survenue : la catégorie n\'a pas été mise à jour.');
            }
        }

        // ---------------------------------------------------------------------------------------------------------
        // MODIFICATION D'UN THEME
        if (!empty($theme) && !empty($themeId)) {
            $themeUpdate = new Theme;
            $themeUpdate->setId($themeId);
            $themeUpdate->setName($theme);
            $themeUpdate->setDescription('Un thème sans résumé');

            $isThemeUpdate = $themeUpdate->update($themeId);

            if ($isThemeUpdate) {
                Flash::setMessage('Le thème a été mis à jour.');
            } else {
                Flash::setMessage('Une erreur est survenue : le thème n\'a pas été mis à jour.');
            }
        }

        // ---------------------------------------------------------------------------------------------------------
        // VERIFICATIONS SUR L'AJOUT
        if (empty($parentTheme) && !empty($newCategory)) {
            $error['parentTheme'] = 'Veuillez choisir un thème parent';
        } else if (!empty($parentTheme) && empty($newCategory)) {
            $error['newCategory'] = 'Veuillez saisir un nom de catégorie';
        }

        if (empty($error)) {

            // AJOUT D'UN THEME
            if (!empty($newTheme)) {
                $addTheme = new Theme;
                $addTheme->setName($newTheme);
                $addTheme->setDescription('Un thème sans résumé.');
                $isAdd = $addTheme->add();

                if ($isAdd) {
                    Flash::setMessage('Le thème a été ajouté.');
                } else {
                    Flash::setMessage('Une erreur est survenue : la thème n\'a pas été ajouté.');
                }
            }

            // AJOUT D'UNE CATEGORIE ET DU LIEN AVEC UN THEME EXISTANT
            if (!empty($parentTheme) && !empty($newCategory)) {
                
                $pdo = Database::getInstance();
                $pdo->beginTransaction();

                $addCategory = new Category;
                $addCategory->setName($newCategory);
                $addCategory->setDescription('Une catégorie sans résumé.');
                $isAdd = $addCategory->add();

                $idCategory = $pdo->lastInsertId();

                $themeCategoryAdd = new Theme_Category;
                $themeCategoryAdd->setIdThemes($parentTheme);
                $themeCategoryAdd->setIdCategories($idCategory);
                $isAddLink = $themeCategoryAdd->add();

                if ($isAdd === true && $isAddLink === true) {
                    $pdo->commit();
                    Flash::setMessage('La catégorie a été ajoutée.');
                } else {
                    $pdo->rollBack();
                    Flash::setMessage('Une erreur est survenue : la catégorie n\'a pas été ajoutée.');
                }
            }
        }
    }

    // METHODES POUR AFFICHER LES DONNEES DES THEMES ET DES CATEGORIES
    $themes = Theme::getAll();
    $themesCategories = Theme_Category::getAll();
    
} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}


// AFFICHAGE DES VUES
include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/dashboard/themes_categories.php');

include_once(__DIR__ . '/../views/templates/footer.php');
