<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/User.php');

try {

    // FEUILLE CSS A CHARGER
    $css = CSS['form'];

    // FEUILLE JS A CHARGER
    $js = JS['register'];

    $titleDoc = 'S\'inscrire';

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = [];

        // ---------------------------------------------------------------------------------------------

        // NOM D'UTILISATEUR
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));

        if (empty($username)) {
            // Pour les champs obligatoires, on retourne une erreur
            $errors['username'] = 'Veuillez saisir un nom d\'utilisateur.';
        } else {

            $usernameOk = filter_var($username, FILTER_VALIDATE_REGEXP, 
            array('options' => array('regexp' => '/' . REGEX_USER . '/')));
            
            
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$usernameOk) {
                $errors['username'] = 'Le nom d\'utilisateur n\'est pas au bon format.';
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($username) >= 50) {
                    $errors['username'] = 'La longueur du nom d\'utilisateur est trop longue (maximum 50 caractères).';
                }
            }
        }

        // ---------------------------------------------------------------------------------------------

        // ADRESSE MAIL
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

        if (empty($email)) {
            $errors['email'] = 'Veuillez saisir une adresse mail.';
        } else {
            $emailOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$emailOk) {
                $errors['email'] = 'L\'adresse mail n\'est pas au bon format.';
            }
        }

        // ---------------------------------------------------------------------------------------------

        // DATE DE NAISSANCE
        $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($birthdate)) {
            $errors['birthdate'] = 'Veuillez saisir une date de naissance.';
        } else {
            $birthdateOk = filter_var($birthdate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$birthdateOk) {
                $errors['birthdate'] = 'La date n\'est pas au bon format.';
            } else {
                $birthdateObj = new DateTime($birthdate);
                $age = date('Y') - $birthdateObj->format('Y');

                if ($age > 120 || $age < 0) {
                    $errors['birthdate'] = 'Votre âge n\'est pas conforme.';
                }
            }
        }

        // ---------------------------------------------------------------------------------------------

        // MOTS DE PASSE
        $password = filter_input(INPUT_POST, 'password');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

        if (empty($password)) {
            $errors['password'] = 'Veuillez saisir un mot de passe.';
        } else if (!empty($password) && empty($confirmPassword)) {
            $errors['confirmPassword'] = 'Veuillez confirmer votre mot de passe.';
        } else {
            if ($password != $confirmPassword) {
                $errors['password'] = 'Les mots de passe ne sont pas identiques.';
                $errors['confirmPassword'] = 'Les mots de passe ne sont pas identiques.';
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        }

        // ---------------------------------------------------------------------------------------------

        // ACCEPTATION CGU
        $cgu = intval(filter_input(INPUT_POST, 'cgu', FILTER_SANITIZE_NUMBER_INT));

        if (empty($cgu)) {
            $errors['cgu'] = 'Veuillez accepter les conditions générales d\'utilisation.';
        } else {
            $cguOk = filter_var($cgu, FILTER_VALIDATE_BOOLEAN);
            if (!$cguOk) {
                $errors['cgu'] = 'Les conditions générales n\'ont pas été correctement acceptées.';
            }
        }

        // ---------------------------------------------------------------------------------------------

        // NEWSLETTERS
        $newsletter = intval(filter_input(INPUT_POST, 'newsletter', FILTER_SANITIZE_NUMBER_INT));

        if (!empty($newsletter)) {
            $newsletterOk = filter_var($newsletter, FILTER_VALIDATE_BOOLEAN);

            if (!$newsletterOk) {
                $errors['newsletter'] = 'La newsletter n\'a pas été correctement acceptée.';
            }
        }


        // VERIFICATION S'IL N'Y A PAS DE DOUBLON
        if (User::isUsernameExist($usernameOk) == true) {
            $errors['username'] = 'Ce nom d\'utilisateur existe déjà';
        }

        if (User::isEmailExist($emailOk) == true) {
            $errors['email'] = 'Ce mail existe déjà';
        }

        // AJOUT DE L'UTILISATEUR SI TOUT EST BON
        if (empty($errors)) {

            $newUser = new User;
            $newUser->setUsername($usernameOk);
            $newUser->setEmail($emailOk);
            $newUser->setBirthdate($birthdateOk);
            $newUser->setPassword($passwordHash);
            $newUser->setNewsletter($newsletterOk);

            $isAdd = $newUser->add();

            if($isAdd) {
                // Utiliser la class php mailer plutôt que la fonction mail() A VOIR !!!
                $to = $newUser->getEmail();
                $subject = 'Validation de compte';
                $link = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/controllers/validate_mail_controller.php?email=' . $newUser->getEmail();
                $mailBody = 'Bonjour<br>Merci de valider votre compte en cliquant sur ce lien <a href="' . $link . '">lien</a>';
                mail($to, $subject, $mailBody);
                Flash::setMessage('Inscription réussie. Veuillez maintenant valider votre compte par mail.');
            } else {
                Flash::setMessage('Problème lors de l\'inscription.');
            }
        }
    }

} catch (\Throwable $th) {
    include_once(__DIR__ . '/../views/templates/header.php');
    include_once(__DIR__ . '/../views/error.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}



// ---------------------------------------------------------------------------------------------


// AFFICHAGE DES VUES

include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/signUp_signIn/register.php');

include_once(__DIR__ . '/../views/templates/footer.php');
