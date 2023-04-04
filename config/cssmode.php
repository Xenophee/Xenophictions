<?php
// Définir les variables pour le mode jour
$day_variables = array(
    "background-color" => "#fff",
    "text-color" => "#000",
    "link-color" => "#00f"
);

// Définir les variables pour le mode nuit
$night_variables = array(
    "background-color" => "#000",
    "text-color" => "#fff",
    "link-color" => "#0ff"
);

// Vérifier si la variable de session 'mode_nuit' est définie et à true
if (isset($_SESSION['mode_nuit']) && $_SESSION['mode_nuit'] == true) {
    // Si le mode nuit est activé, utiliser les variables pour le mode nuit
    $variables = $night_variables;
} else {
    // Sinon, utiliser les variables pour le mode jour
    $variables = $day_variables;
}

// Générer le fichier CSS personnalisé en fonction des variables sélectionnées
header("Content-type: text/css; charset: UTF-8");
foreach ($variables as $property => $value) {
    echo "--" . $property . ": " . $value . "; ";
}


// Utiliser une balise link après pour incorporer le fichier en HTML

