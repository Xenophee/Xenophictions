<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/User.php');

try {

    // FEUILLE CSS A CHARGER
    $css = CSS['form'];

    $titleDoc = 'Se connecter';

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // RECUPERATION DES DONNEES ENVOYEES
        $email = trim((string)filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $password = filter_input(INPUT_POST, 'password');
        $stayConnect = intval(filter_input(INPUT_POST, 'stayConnect', FILTER_SANITIZE_NUMBER_INT));
        
        // VERIFICATION DE L'EXISTENCE DU COMPTE
        if (!User::isEmailExist($email)) {
            $errors['email'] = 'Ce compte n\'existe pas';
        }

        if (empty($errors)) {
            // RECUPERATION DU COMPTE CONCERNE
            $user = User::getByEmail($email);

            // RECUPERATION ET COMPARAISON DES MOTS DE PASSE
            $hash = $user->password;
            $isPasswordOk = password_verify($password, $hash);


            if (!$isPasswordOk) {
                Flash::setMessage('Votre identifiant et mot de passe ne correspondent pas.');

            } else {
                
                // VERIFICATION DE LA VALIDATION DU COMPTE
                if (is_null(($user->validated_at))) {
                    Flash::setMessage('Vous n\'avez pas encore validé votre compte.');

                } else {
                    // CREATION DE LA SESSION UTILISATEUR SI TOUT EST BON
                    $_SESSION['user'] = $user;
                    // unset($user->hash);

                    // CREATION DU COOKIE D'UNE DUREE D'UN MOIS EN CAS DE CASE COCHEE SUR LA PROLONGATION DE LA SESSION
                    if ($stayConnect == true) {
                        setcookie('userSession', serialize($_SESSION['user']),  time() + 2592000, '/'); 
                    }

                    // RENVOI SUR LA PAGE PROFIL ET FIN DU TRAITEMENT
                    header('location: /controllers/profil_controller.php');
                    die;
                }
            }
        }
    }
    
} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}



// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/signUp_signIn/connection.php');

include_once(__DIR__ . '/../views/templates/footer.php');
