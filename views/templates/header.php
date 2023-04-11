<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&family=Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/bootstrap-icons-1.10.3/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/assets/css/general.css">
    <link rel="stylesheet" href="<?= $css ?? '' ?>">
    <link rel="stylesheet" href="<?= $css2 ?? '' ?>">
    <link rel="stylesheet" href="<?= $css3 ?? '' ?>">
    <link rel="icon" type="image/png" href="../../public/assets/img/Xenophictions_logo.png">
    <title><?= $titleDoc ?></title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="deco"></div>
        <nav class="navbar navbar-dark navbar-expand-xl bg-body-tertiary shadow ">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../controllers/home_controller.php">
                    <img src="../../public/assets/img/Xenophictions_logo.png" alt="Logo du site Xénophictions" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Ouvrir la navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mt-4 mt-xl-0 mx-4 mx-xl-auto">
                        <li class="nav-item mx-xl-4 mx-xxl-5 mb-4 mb-xl-0 mt-2 mt-xl-0">
                            <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'catalog_controller.php' && isset($_GET['type']) && $_GET['type'] == 1) echo ' active'; ?>" href="../../controllers/catalog_controller.php?type=1">Récits linéaires</a>
                        </li>
                        <li class="nav-item mx-xl-4 mx-xxl-5 mb-4 mb-xl-0">
                            <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'catalog_controller.php' && isset($_GET['type']) && $_GET['type'] == 2) echo ' active'; ?>" href="../../controllers/catalog_controller.php?type=2">Récits interactifs</a>
                        </li>
                    </ul>

                    <?php if (!isset($_SESSION['user'])) { ?>
                        <ul class="navbar-nav d-flex justify-content-xl-end align-items-baseline">
                            <li class="nav-item">
                                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'register_controller.php') echo ' active'; ?> mb-4 mb-xl-0" aria-current="page" href="../../controllers/register_controller.php">S'inscrire</a>
                            </li>
                            <li class="nav-item mx-xl-3 mx-xxl-4 mb-2 mb-xl-0">
                                <a class="nav-link logIn shadow px-4" href="../../controllers/connection_controller.php">Se
                                    connecter</a>
                            </li>
                        </ul> <?php } else { ?>

                        <ul class="navbar-nav d-flex justify-content-xl-end align-items-baseline mx-4 mx-xl-0">
                            <li class="nav-item userLink">
                                <a class="nav-link d-flex justify-content-xl-end align-items-center mb-4 mb-xl-0" aria-current="page" href="../../controllers/profil_controller.php"><?= $_SESSION['user']->username ?> <img src="../../public/assets/img/others/avatar.jpg" alt="Votre avatar" class="img-fluid rounded-circle userAvatarNav ms-3"></a>
                            </li>
                            <li class="nav-item me-4"><a href="../../controllers/deconnection_controller.php" title="Se déconnecter" class="nav-link"><i class="bi bi-box-arrow-in-right"></i></a></li>
                        </ul> <?php } ?>

                </div>
            </div>
        </nav>
    </header>