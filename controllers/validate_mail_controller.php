<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/User.php');

try {

    // RECUPERATION DE L'EMAIL DU COMPTE
    $email = trim(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL));

    // VALIDATION DU COMPTE
    $isValidated = User::validateEmail($email);

    // CREATION DU MESSAGE EN CAS DE REUSSITE OU NON
    if ($isValidated) {
        Flash::setMessage('Validation réussie. Vous pouvez maintenant vous connecter.');
    } else {
        Flash::setMessage('Problème lors de la validation');
    }
    
} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

// REGARDER LES JWT JASON WEB TOKEN pour hashé les paramètres d'url


// REDIRECTION VERS LA PAGE DE CONNEXION
header('location: /controllers/connection_controller.php');

die;
