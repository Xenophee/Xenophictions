<?php

require_once(__DIR__ . '/../config/init.php');
require_once(__DIR__ . '/../models/User.php');

try {

    // RECUPERATION DES INFOS UTILISATEUR EN FONCTION DU COOKIE OU DE LA SESSION
    if (isset($_COOKIE['userSession'])) {
        $user = unserialize($_COOKIE['userSession']);
    } else {
        $user = $_SESSION['user'];
    }

    // EXPULSION DES NON INSCRITS
    if (empty($user)) {
        header('location: /404.php');
        die;
    }

    // FEUILLE CSS A CHARGER
    $css = CSS['account'];
    $css2 = CSS['form'];

    $titleDoc = 'Profil';

    // TRAITEMENT EN CAS D'ENVOI DE DONNEES
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $error = [];

        // ---------------------------------------------------------------------------------------------

        // NOM D'UTILISATEUR
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));

        if (empty($username)) {
            // Pour les champs obligatoires, on retourne une erreur
            $errors['username'] = 'Veuillez saisir un nom d\'utilisateur.';
        } else {
            $usernameOk = filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_USER . '/')));
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
        $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);

        if (empty($birthdate)) {
            $errors['birthdate'] = 'Veuillez saisir une date de naissance.';
        } else {
            $birthdateOk = filter_var($birthdate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$birthdateOk) {
                $errors['birthdate'] = 'La date n\'est pas au bon format.';
            } else {
                $birthdateObj = new DateTime($birthdate);
                // Calcul de l'age de l'utilisateur (année courante - année de naissance)
                $age = date('Y') - $birthdateObj->format('Y');

                if ($age > 120 || $age < 0) {
                    $errors['birthdate'] = 'Votre âge n\'est pas conforme.';
                }
            }
        }

        // ---------------------------------------------------------------------------------------------

        // MOT DE PASSE

        $password = filter_input(INPUT_POST, 'password');
        $newPassword = filter_input(INPUT_POST, 'newPassword');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

        $hash = $user->password;
        $isPasswordOk = password_verify($password, $hash);

        if (!$isPasswordOk) {
            $error['password'] = 'Le mot de passe n\'est pas le bon.';
        } else if (!empty($newPassword) && empty($confirmPassword)) {
            $error['confirmPassword'] = 'Veuillez confirmer votre mot de passe.';
        } else {
            if ($password != $confirmPassword) {
                $error['newPassword'] = 'Les mots de passe ne sont pas identiques.';
                $error['confirmPassword'] = 'Les mots de passe ne sont pas identiques.';
            }

            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        }


        // MODIFICATION DES INFORMATIONS UTILISATEUR SI TOUT EST BON
        if (empty($errors)) {
            $userUpdate = new User;

            if ($username != $user->username && User::isUsernameExist($username)) {
                $errors['username'] = 'Ce nom d\'utilisateur existe déjà';
            } else {
                $userUpdate->setUsername($username);
            }

            if ($email != $user->email && User::isEmailExist($email)) {
                $errors['mail'] = 'Ce mail existe déjà';
            } else {
                $userUpdate->setEmail($email);
            }

            $userUpdate->setBirthdate($birthdate);

            if (empty($errors)) {
                $isUpdated = $userUpdate->update($user->id_users);

                if ($isUpdated) {
                    Flash::setMessage('Vos informations ont été mises à jours.');

                    // MISE A JOUR DES INFORMATIONS DE SESSION ET DU COOKIE S'IL EXISTE
                    $userUpdated = User::get($user->id_users);
                    $_SESSION['user'] = $userUpdated;

                    if (isset($_COOKIE['userSession'])) {
                        setcookie('userSession', serialize($userUpdated),  time() + 2592000, '/');
                    }

                } else {
                    Flash::setMessage('Un problème est survenu : vos informations n\'ont été mises à jours.');
                }
            }

            if (!empty($passwordHash)) {
                $userUpdate->setPassword($passwordHash);
                $isPasswordUpdated = $userUpdate->updatePassword($user->id_users);

                if ($isUpdated) {
                    Flash::setMessage('Votre mot de passe a été mis à jour.');
                } else {
                    Flash::setMessage('Un problème est survenu : votre mot de passe n\'a pas été mis à jour.');
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

include(__DIR__ . '/../views/profil/profil.php');

include_once(__DIR__ . '/../views/templates/footer.php');
