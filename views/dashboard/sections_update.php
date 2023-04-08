<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>



            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-5">
                    <div class="my-5">
                        <h1>Modification de la section</h1>
                    </div>

                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <form class="formStories" method="POST" novalidate>

                        <div class="d-flex justify-content-center mt-5">

                            <!-- CHOIX DU CHAPITRE -->
                            <div class="w-50">
                                <label for="chapter" class="form-label mb-2">Choisir le chapitre :</label>
                                <select class="form-select" name="chapter" id="chapter">
                                    <option>-</option>
                                    <?php foreach ($chapters as $chapter) {
                                        $isSelected = ($idChapter == $chapter->id_chapters) ? 'selected' : '';
                                        echo "<option value=\"$chapter->id_chapters\" $isSelected>$chapter->title</option>";
                                    } ?>
                                </select>
                                <small class="text-danger fst-italic mt-2"><?= $errors['chapter'] ?? '' ?></small>
                            </div>
                        </div>

                        <!-- NOM DE LA SECTION -->
                        <div class="d-flex flex-column align-items-center my-5">
                            <label for="title" class="form-label mb-2">Titre de la section * :</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $title ?? $section->title ?>">
                            <small class="text-danger fst-italic mt-2"><?= $errors['title'] ?? '' ?></small>
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="mb-5">
                            <label for="description" class="form-label d-flex justify-content-center">Description *
                                :</label>
                            <textarea class="form-control" id="description" name="description" required><?= $description ?? $section->description ?></textarea>
                            <small class="text-danger fst-italic mt-2"><?= $errors['description'] ?? '' ?></small>
                        </div>

                        <!-- CONTENU -->
                        <div class="mb-5">
                            <label for="content" class="form-label d-flex justify-content-center">Contenu *
                                :</label>
                            <textarea class="form-control" id="content" name="content" required><?= $content ?? $section->content ?></textarea>
                            <small class="text-danger fst-italic mt-2"><?= $errors['content'] ?? '' ?></small>
                        </div>

                        <!-- CHOIX DE LA SECTION LIE -->
                        <div class="d-flex flex-wrap justify-content-around">
                            <!-- SECTIONS -->
                            <div class="d-flex flex-column align-items-center">

                                <h2 class="mb-5">Choisir la ou les sections parentes</h2>
                                <!-- CHOIX DE LA SECTION LIE -->
                                <div class="d-flex flex-wrap justify-content-around" id="sectionsLink">
                                    <!-- SECTIONS -->
                                    <?php
                                        foreach ($chapters as $chapter) { ?>
                                            <div class="d-flex flex-column mt-4 mb-5 mx-5">
                                                <h3 class="text-center mb-4"><?= $chapter->title ?></h3>
                                                <?php
                                                $sections = Section::getAll($chapter->id_chapters);
                                                foreach ($sections as $section) {
                                                    $isChecked = '';
                                                    foreach($sectionsLink as $sectionLink) {
                                                        if ($section->id_sections == $sectionLink->id_sections_parent) {
                                                            $isChecked = 'checked';
                                                            break;
                                                        }
                                                    } ?>
                                                    <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                        <input class="form-check-input" type="checkbox" name="sectionsLink[]" value="<?= $section->id_sections ?>" id="<?= $section->title ?>" <?= $isChecked ?? ''?>>
                                                        <label class="form-check-label ms-3" for="<?= $section->title ?>"><?= $section->id_sections ?>. <?= $section->title ?></label>
                                                    </div> <?php } ?>
                                            </div> <?php } ?>
                                </div>
                                <small class="text-danger fst-italic mt-2"><?= $errors['section'] ?? '' ?></small>

                                <hr class="w-50">
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

                </section>
            </div>
        </div>
    </div>
</main>