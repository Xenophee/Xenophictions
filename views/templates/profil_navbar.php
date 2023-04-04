<div class="col-12 col-xl-2 profilNav">
    <aside>
        <nav class="navbar navbar-expand-xl">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Offcanvas dark navbar</a> -->
                <button class="navbar-toggler ms-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end offcanvasColor" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Navigation - Profil
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="d-flex flex-column navbar-nav justify-content-end flex-grow-1 pe-3 mt-4">
                            <li class="nav-item py-2 px-4 px-xl-0">
                                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'profil_controller.php') echo ' active'; ?>" aria-current="page" href="../../controllers/profil_controller.php"><i class="bi bi-person-bounding-box mx-3"></i>Profil</a>
                            </li>
                            <li class="nav-item py-2 px-4 px-xl-0">
                                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'archive_controller.php') echo ' active'; ?>" href="../../controllers/archive_controller.php"><i class="bi bi-clock-history mx-3"></i>Historique</a>
                            </li>
                            <li class="nav-item py-2 px-4 px-xl-0">
                                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'preferences_controller.php') echo ' active'; ?>" href="../../controllers/preferences_controller.php"><i class="bi bi-gear mx-3"></i>Préférences</a>
                            </li>

                            <?php if ($_SESSION['user']->admin == true) { ?>
                                <li class="nav-item py-2 px-4 px-xl-0">
                                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'users_list_controller.php') echo ' active'; ?>" href="../../controllers/users_list_controller.php?currentPage=1"><i class="bi bi-people mx-3"></i>Liste des
                                        utilisateurs</a>
                                </li>
                                <li class="nav-item py-2 px-4 px-xl-0">
                                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'stories_list_controller.php') echo ' active'; ?>" href="../../controllers/stories_list_controller.php?currentPage=1"><i class="bi bi-bookshelf mx-3"></i></i>Liste
                                        des histoires</a>
                                </li>
                                <li class="nav-item py-2 px-4 px-xl-0">
                                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'moderation_controller.php') echo ' active'; ?>" href="../../controllers/moderation_controller.php"><i class="bi bi-ui-checks mx-3"></i>Modération</a>
                                </li>
                                <li class="nav-item py-2 px-4 px-xl-0">
                                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'stories_add_controller.php') echo ' active'; ?>" href="../../controllers/stories_add_controller.php"><i class="bi bi-book mx-3"></i>Ajouter
                                        une histoire</a>
                                </li>
                                <li class="nav-item py-2 px-4 px-xl-0">
                                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'chapters_add_controller.php') echo ' active'; ?>" href="../../controllers/chapters_add_controller.php"><i class="bi bi-card-heading mx-3"></i>Ajouter
                                        un chapitre</a>
                                </li>
                                <li class="nav-item py-2 px-4 px-xl-0">
                                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'sections_add_controller.php') echo ' active'; ?>" href="../../controllers/sections_add_controller.php"><i class="bi bi-journal-text mx-3"></i>Ajouter
                                        une section</a>
                                </li>
                                <li class="nav-item py-2 px-4 px-xl-0">
                                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'themes_categories_controller.php') echo ' active'; ?>" href="../../controllers/themes_categories_controller.php"><i class="bi bi-bookmark-plus mx-3"></i>Thèmes & catégories</a>
                                </li> <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </aside>
</div>