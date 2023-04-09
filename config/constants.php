<?php

// INFOS DE CONNEXION A LA BASE
define('DATABASE_NAME', 'mysql:host=localhost;dbname=xenophictions');
define('DATABASE_USER', 'xenophictions_user');
define('DATABASE_PASSWORD', '2E[H3!u01m*Wdhe!');


// CONSTANTES REGEX POUR FORMULAIRE
define('REGEX_USER','^[a-zA-ZÀ-ÿ\'\-]{2,}$');
define('REGEX_MAIL', '([_A-Za-z0-9-]+)(\.[_A-Za-z0-9-]+)@([A-Za-z0-9]+)(\.[A-Za-z0-9]+)');
// define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_DATE',"^\d{4}-\d{2}-\d{1,2}$");


define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);
define('MAX_FILE_SIZE', 5*1024*1024);
define('LOCATION_USERS', $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/users/');
define('LOCATION_STORIES', $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/stories/');
// 5 Mo


// REPERTOIRE DES FICHIERS CSS
define('CSS', [
    'general' =>'../../public/assets/css/general.css',
    'account' =>'../../public/assets/css/account.css',
    'catalog' =>'../../public/assets/css/catalog.css',
    'chapter' =>'../../public/assets/css/chapter.css',
    'section' =>'../../public/assets/css/section.css',
    'dashboard' =>'../../public/assets/css/dashboard.css',
    'form' =>'../../public/assets/css/form.css',
    'home' =>'../../public/assets/css/home.css',
    'summary' =>'../../public/assets/css/summary.css',
]);

// REPERTOIRE DES FICHIERS JS
define('JS', [
    'data' => '../../public/assets/js/data.js',
    'dataSections' => '../../public/assets/js/dataSections.js',
    'summary' => '../../public/assets/js/summary.js',
    'register' => '../../public/assets/js/register.js',
    'form' => '../../public/assets/js/form.js',
    'script' => '../../public/assets/js/script.js'
]);


// REPERTOIRE DU CONTENU CATALOGUE
define('CATALOG', [
    1 => 'Récits linéaires',
    2 => 'Récits interactifs',
]);


// ICONES DE THEME
define('THEME_ICON', [
    1 => '../public/assets/img/others/homme-invisible.png',
    2 => '../public/assets/img/others/cyborg.png',
    3 => '../public/assets/img/others/sorcier.png',
]);

// CONSTANTE DE PAGINATION
define('NB_ELEMENTS_BY_PAGE', 10);


// MESSAGES FLASH DE SUPPRESSION
define('CODE', [
    0 => 'L\'utilisateur a été supprimé.',
    1 => 'Une erreur est survenue : l\'utilisateur n\'a pas été supprimé.',
    2 => 'La catégorie a été supprimée.',
    3 => 'Une erreur est survenue : la catégorie n\'a pas été supprimée.',
    4 => 'Le thème a été supprimé.',
    5 => 'Une erreur est survenue : le thème n\'a pas été supprimé.',
    6 => 'L\'histoire a été supprimée.',
    7 => 'Une erreur est survenue : l\'histoire n\'a pas été supprimé.',
    8 => 'Le chapitre a été supprimé',
    9 => 'Une erreur est survenue : le chapitre n\'a pas été supprimé',
    10 => 'La section a été supprimée',
    11 => 'Une erreur est survenue : la section n\'a pas été supprimée',

]);

define('PUBLICATION', [
    'STORY_PUBLISHED' => 'L\'histoire a été publiée sur le site',
    'STORY_NOT_PUBLISHED' => 'Une erreur est survenue : l\'histoire n\'a pas été publiée',
    'COMMENT_PUBLISHED' => 'Le commentaire a été publié sur le site',
    'COMMENT_NOT_PUBLISHED' => 'Une erreur est survenue : le commentaire n\'a pas été publié'
]);

