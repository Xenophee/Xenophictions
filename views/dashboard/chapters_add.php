<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>



            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-md-5">
                    <div class="my-5">
                        <h1 class="mb-5">Ajouter un chapitre</h1>
                    </div>

                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <form class="formStories" method="POST">

                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- CHOIX DE L'HISTOIRE -->
                                <label for="story" class="form-label mb-2">Choisir l'histoire :</label>
                                <select class="form-select" name="story" id="story">
                                    <option>-</option>
                                    <?php foreach ($stories as $story) {
                                        echo "<option value=\"$story->id_stories\">$story->title</option>";
                                    } ?>
                                </select>
                                <small class="text-danger fst-italic mt-2"><?= $errors['story'] ?? '' ?></small>
                            </div>

                            <div>
                                <!-- INDEX -->
                                <div>
                                    <label for="index" class="form-label mb-2">Index (définit l'ordre) * :</label>
                                    <input type="number" class="form-control" id="index" name="index" value="<?= htmlentities($index ?? '') ?>">
                                    <small class="text-danger fst-italic mt-2"><?= $errors['index'] ?? '' ?></small>
                                </div>
                            </div>
                        </div>

                        <!-- NOM DU CHAPITRE -->
                        <div class="d-flex flex-column align-items-center my-5">
                            <label for="title" class="form-label mb-2">Nom du chapitre * :</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= htmlentities($title ?? '') ?>">
                            <small class="text-danger fst-italic mt-2"><?= $errors['title'] ?? '' ?></small>
                        </div>



                        <!-- RESUME -->
                        <div class="mb-3">
                            <label for="summary" class="form-label d-flex justify-content-center">Résumé *
                                :</label>
                            <textarea class="form-control" id="summary" name="summary" required><?= htmlentities($summary ?? '') ?></textarea>
                            <small class="text-danger fst-italic mt-2"><?= $errors['summary'] ?? '' ?></small>
                        </div>

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