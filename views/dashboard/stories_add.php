<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>

            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-md-5">
                    <div class="my-5">
                        <h1 class="mb-5">Ajouter une histoire</h1>
                    </div>

                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <form class="formStories" method="POST" enctype="multipart/form-data" novalidate>

                        <!-- IMAGE DE L'HISTOIRE -->
                        <div class="d-flex justify-content-center mb-4">
                            <img src="../public/assets/img/livresLandscape.jpg" class="coverLandscape img-fluid" alt="Image de couverture">
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn">
                                <label class="form-label m-1" for="cover">Image de couverture</label>
                                <input type="file" class="form-control d-none" id="cover" name="cover" accept="image/jpeg" required>
                            </div>
                        </div>

                        <!-- TITRE DE L'OEUVRE -->
                        <div class="d-flex flex-column align-items-center my-5">
                            <label for="title" class="form-label mb-2">Titre de l'oeuvre * :</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= htmlentities($title ?? '') ?>" required>
                            <small class="text-danger fst-italic mt-2"><?= $errors['title'] ?? '' ?></small>
                        </div>

                        <!-- AUTEUR -->
                        <div class="d-flex flex-column align-items-center my-5">
                            <label for="author" class="form-label mb-2">Auteur :</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Xénophée">
                            <small class="text-danger fst-italic mt-2"><?= $errors['author'] ?? '' ?></small>
                        </div>

                        <!-- CHOISIR LE TYPE -->
                        <div class="mb-5">
                            <label class="d-flex justify-content-center">Type * :</label>
                            <div class="d-flex flex-column flex-lg-row justify-content-center mt-4">
                                <div class="d-inline d-flex align-items-center me-5 mb-4 mb-lg-0">
                                    <input type="radio" name="type" value="1" id="linear" class="form-check-input me-2" required <?= ((isset($type) && $type == 1)) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="linear">Linéaire</label>
                                </div>
                                <div class="ps-lg-3 d-inline d-flex align-items-center mb-4 mb-lg-0">
                                    <input type="radio" name="type" value="2" id="interactive" class="form-check-input me-2" required <?= ((isset($type) && $type == 2)) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="interactive">Interactif</label>
                                </div>
                            </div>
                            <small class="d-flex justify-content-center text-danger fst-italic mt-2"><?= $errors['type'] ?? '' ?></small>
                        </div>

                        <!-- CHOISIR LES CATEGORIES -->
                        <div>
                            <label class="d-flex justify-content-center pt-5 mt-5">Catégories * :</label>
                        </div>

                        <div class="d-flex flex-wrap justify-content-around">
                            <!-- CATEGORIES -->
                            <?php foreach ($themesCategories as $key => $themeCategory) { ?>
                                <div class="d-flex flex-column mt-4 mb-5 mx-5">
                                    <h2 class="text-center mb-4"><?= $themeCategory->themes_name ?></h2>
                                    <?php if (!is_null($themeCategory->categories_names) && !is_null($themeCategory->id_categories)) {
                                        $count = 1;
                                        $categories = explode(',', $themeCategory->categories_names);
                                        $categoriesId = explode(',', $themeCategory->id_categories);
                                        foreach (array_combine($categoriesId, $categories) as $id => $category) {
                                            $isChecked = (isset($themeCategories) && in_array($id, $themeCategories)); ?>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="themeCategories[]" value="<?= $id ?>" id="<?= $category ?>" required <?= $isChecked ? 'checked' : '' ?>>
                                                <label class="form-check-label ms-3" for="<?= $category ?>"><?= $category ?></label>
                                            </div> <?php }
                                            } ?>
                                </div> <?php } ?>
                            <small class="text-danger fst-italic mt-2"><?= $errors['themeCategories'] ?? '' ?></small>
                        </div>

                        <!-- SYNOPSIS -->
                        <div class="mb-3">
                            <label for="synopsis" class="form-label d-flex justify-content-center">Synopsis * :</label>
                            <textarea class="form-control" id="synopsis" name="synopsis" required><?= htmlentities($synopsis ?? '') ?></textarea>
                            <small class="text-danger fst-italic mt-2"><?= $errors['synopsis'] ?? '' ?></small>
                        </div>

                        <!-- BOUTON VALIDATION -->
                        <div class="d-flex justify-content-center my-5">
                            <button type="submit" class="btn py-2 px-5">Valider</button>
                        </div>

                    </form>

                </section>
            </div>
        </div>
    </div>
</main>