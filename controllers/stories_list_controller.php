<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/Story.php');


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

    // FICHIERS CSS A CHARGER
    $css = CSS['account'];
    $css2 = CSS['dashboard'];
    $css3 = CSS['form'];

    // Nettoyage en cas de recherche
    $search = trim((string)filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));

    // On définit le nombre d'éléments par page grâce à une constante
    $limit = NB_ELEMENTS_BY_PAGE;

    // Donne le nombre d'utilisateur sur le site
    $storiesNb = Story::count();

    // Calcule le nombre de pages à afficher dans la pagination
    $nbPages = ceil($storiesNb / $limit);

    // Nettoyage de la page
    $currentPage = intval(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT));

    // Si la valeur de la page demandée n'est pas cohérente, on réinitialise à 0
    if ($currentPage <= 0 || $currentPage > $nbPages) {
        $currentPage = 1;
    }
    
    // Définit à partir de quel enregistrement positionner le curseur (l'offset) dans la requête
    $offset = ($currentPage - 1) * $limit;

    $type = null;

    // Appel à la méthode statique permettant de récupérer les utilisateurs selon la recherche et la pagination
    $stories = Story::getAll($type, $limit, $offset);
    
} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/dashboard/stories_list.php');

include_once(__DIR__ . '/../views/templates/footer.php');