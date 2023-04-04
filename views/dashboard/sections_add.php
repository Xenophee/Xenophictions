<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>



            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-md-5">
                    <div class="my-5">
                        <h1 class="mb-5">Ajouter une section</h1>
                    </div>

                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <form class="formStories" method="POST" id="formStories" novalidate>

                        <div class="d-flex justify-content-between">
                            
                            <!-- CHOIX DE L'HISTOIRE -->
                            <div>
                                <label for="story" class="form-label mb-2">Choisir l'histoire :</label>
                                <select class="form-select" name="story" id="story">
                                    <option>-</option>
                                    <?php foreach ($stories as $story) {
                                        echo "<option value=\"$story->id_stories\">$story->title</option>";
                                    } ?>
                                </select>
                                <small class="text-danger fst-italic mt-2"><?= $errors['story'] ?? '' ?></small>
                            </div>

                            <!-- CHOIX DU CHAPITRE -->
                            <div>
                                <label for="chapter" class="form-label mb-2">Choisir le chapitre :</label>
                                <select class="form-select" name="chapter" id="chapter">
                                </select>
                                <small class="text-danger fst-italic mt-2"><?= $errors['chapter'] ?? '' ?></small>
                            </div>
                        </div>

                        <!-- NOM DE LA SECTION -->
                        <div class="d-flex flex-column align-items-center my-5">
                            <label for="title" class="form-label mb-2">Titre de la section * :</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= htmlentities($title ?? '') ?>">
                            <small class="text-danger fst-italic mt-2"><?= $errors['title'] ?? '' ?></small>
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="mb-5">
                            <label for="description" class="form-label d-flex justify-content-center">Description *
                                :</label>
                            <textarea class="form-control" id="description" name="description" required><?= htmlentities($description ?? '') ?></textarea>
                            <small class="text-danger fst-italic mt-2"><?= $errors['description'] ?? '' ?></small>
                        </div>

                        <!-- CONTENU -->
                        <div class="mb-5">
                            <label for="content" class="form-label d-flex justify-content-center">Contenu *
                                :</label>
                            <textarea class="form-control" id="content" name="content" required><?= htmlentities($content ?? '') ?></textarea>
                            <small class="text-danger fst-italic mt-2"><?= $errors['content'] ?? '' ?></small>
                        </div>

                        <!-- CHOIX DE LA SECTION LIE -->
                        <div class="d-flex flex-wrap justify-content-around" id="sectionsLink">
                            <!-- SECTIONS -->
                            <?php foreach ($sections as $key => $section) { ?>
                                <div class="d-flex flex-column mt-4 mb-5 mx-5">
                                    <h2 class="text-center mb-4"><?= $section->chapters_titles ?></h2>
                                    <?php 
                                        $count = 1;
                                        $sectionsTitles = explode('|', $section->sections_titles);
                                        $sectionsId = explode('|', $section->id_sections);
                                        // array_multisort($categories, SORT_ASC, $categoriesId);
                                        foreach (array_combine($sectionsId, $sectionsTitles) as $id => $sectionTitle) {
                                            $isChecked = (isset($themeCategories) && in_array($id, $themeCategories)); ?>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="sectionsLink[]" value="<?= $id ?>" id="<?= $sectionTitle ?>" required <?= $isChecked ? 'checked' : '' ?>>
                                                <label class="form-check-label ms-3" for="<?= $sectionTitle ?>">{<?= $id ?>} <?= $sectionTitle ?></label>
                                            </div> <?php 
                                            } ?>
                                </div> <?php } ?>
                        </div>
                        <small class="text-danger fst-italic mt-2"><?= $errors['section'] ?? '' ?></small>

                        <!-- BOUTON VALIDATION -->
                        <div class="d-flex justify-content-center my-5">
                            <button type="submit" class="btn px-5 py-2">Valider</button>
                        </div>

                    </form>

                </section>
            </div>
        </div>
    </div>
</main>