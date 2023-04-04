<?php

require_once(__DIR__ . '/../config/init.php');

// DESTRUCTION DU COOKIE DE CONNEXION S'IL EXISTE
if (isset($_COOKIE['userSession'])) {
    setcookie('userSession', serialize($_SESSION['user']), time() - 3600, '/');
}

// DESTRUCTION DE LA SESSION
unset($_SESSION['user']);

session_destroy();

// supprimer aussi le cookie PHPSSID dans l'ideal

// RENVOI VERS LA PAGE D'ACCUEIL
header('location: /controllers/home_controller.php');

die;