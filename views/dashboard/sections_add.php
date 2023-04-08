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


                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($errors))) { ?>

                        <form class="formStories" method="POST" novalidate>

                            <div class="d-flex flex-column align-items-center">

                                <h2 class="mb-5">Choisir la ou les sections parentes</h2>
                                <!-- CHOIX DE LA SECTION LIE -->
                                <div class="d-flex flex-wrap justify-content-around" id="sectionsLink">
                                    <!-- SECTIONS -->
                                    <?php
                                    if (isset($chapters)) {
                                        foreach ($chapters as $chapter) { ?>
                                            <div class="d-flex flex-column mt-4 mb-5 mx-5">
                                                <h3 class="text-center mb-4"><?= $chapter->title ?></h3>
                                                <?php
                                                $sections = Section::getAll($chapter->id_chapters);
                                                foreach ($sections as $section) { ?>
                                                    <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                        <input class="form-check-input" type="checkbox" name="sectionsLink[]" value="<?= $section->id_sections ?>" id="<?= $section->title ?>">
                                                        <label class="form-check-label ms-3" for="<?= $section->title ?>"><?= $section->id_sections ?>. <?= $section->title ?></label>
                                                    </div> <?php } ?>
                                            </div> <?php }
                                            } ?>
                                </div>
                                <small class="text-danger fst-italic mt-2"><?= $errors['section'] ?? '' ?></small>

                                    <div class="form-check d-flex align-items-center mt-5 mb-4 mb-lg-2">
                                        <input class="form-check-input" type="checkbox" name="none" value="1" id="none">
                                        <label class="form-check-label ms-3" for="none">Pas de section parente</label>
                                    </div>
                                
                                <!-- BOUTON VALIDATION -->
                                <div class="d-flex justify-content-center my-5">
                                    <button type="submit" class="btn px-5 py-2">Valider</button>
                                </div>

                            </div>

                        </form>

                    <?php } else { ?>

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
                                <textarea class="form-control" id="description" name="description" required><?= $description ?? '' ?></textarea>
                                <small class="text-danger fst-italic mt-2"><?= $errors['description'] ?? '' ?></small>
                            </div>

                            <!-- CONTENU -->
                            <div class="mb-5">
                                <label for="content" class="form-label d-flex justify-content-center">Contenu *
                                    :</label>
                                <textarea class="form-control" id="content" name="content" required><?= htmlentities($content ?? '') ?></textarea>
                                <small class="text-danger fst-italic mt-2"><?= $errors['content'] ?? '' ?></small>
                            </div>

                            <!-- BOUTON VALIDATION -->
                            <div class="d-flex justify-content-center my-5">
                                <button type="submit" class="btn px-5 py-2" name="continue">Continuer</button>
                            </div>

                        </form> <?php } ?>

                </section>
            </div>
        </div>
    </div>
</main>