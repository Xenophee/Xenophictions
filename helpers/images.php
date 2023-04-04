<?php

// Voir Network -> payload pour constater l'envoi des fichiers
        if (isset($_FILES['avatar'])) {
            $avatar = $_FILES['avatar'];
            if (!empty($avatar['tmp_name'])) {
                if ($avatar['error'] > 0) {
                    $error['avatar'] = 'Erreur survenue durant le transfert du fichier';
                } else {
                    if (!in_array($avatar['type'], AUTHORIZED_IMAGE_FORMAT)) {
                        $error['avatar'] = 'Ce type de fichier n\'est pas accepté';
                    } else if ($_FILES['avatar']['size'] > MAX_FILE_SIZE) {
                        $error['avatar'] = 'Poids de l\'image trop élevé';
                    } else {
                        $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
                        $from = $avatar['tmp_name'];
                        $fileName = uniqid('img_') . '.' . $extension;
                        $to = LOCATION_USERS . $fileName;
                        move_uploaded_file($from, $to);
                    }
                }
            }
        }

        if ($avatar['error'] == 4) {
            $error['avatar'] = 'Champs obligatoire';
        }
        if ($_FILES['avatar']['size'] > MAX_FILE_SIZE) {
            $error['avatar'] = 'Poids de l\'image trop élevé';
        }

        // imagecopyresampled();

        // Création d'une gdImage
        $gd_src = imagecreatefromjpeg($to);

        $height_original = imagesy($gd_scaled);
        $width_original = imagesx($gd_scaled);

        $isPortrait = ($height_original > $width_original) ? true : false;

        if ($isPortrait) {
            $height_scaled = -1;
            // Mettre les dimensions fixes dans des constantes
            $width_scaled = 300;
        } else {
            $height_scaled = 300;
            $width_scaled = round(($width_original / $height_original) * $height_scaled);
        }

        // Redimensionnement
        $gd_scaled = imagescale($gd_src, 300, -1, IMG_BICUBIC);
        // On stocke la nouvelle image
        $to_scaled = LOCATION_USERS . 'scaled' . $extension;


        // Par défaut la qualité est de 75
        imagejpeg($gd_scaled, $to_scaled);
        // On récupère la hauteur de l'image redimensionnée
        $height_scaled = imagesy($gd_scaled);
        $width_scaled = imagesx($gd_scaled);

        // Calcul qui permet le recadrage centré sur 300px
        if ($height_scaled > $width_scaled) {
            // Portrait
            $y_cropped = ($height_scaled - 300) / 2;
            $x_cropped = 0;
        } else {
            // Paysage
            $y_cropped = 0;
            $x_cropped = ($width_scaled - 300) / 2;
        }

        // Recadrage
        imagecrop($gd_scaled, ['x' => $x_cropped, 'y' => $y_cropped, 'width' => 300, 'height' => 300]);
        // On stocke la nouvelle image
        $to_cropped = LOCATION_USERS . 'cropped' . $extension;
        imagejpeg($gd_scaled, $to_scaled);