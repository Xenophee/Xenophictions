<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>



            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-5">
                    <div class="my-5">
                        <h1>Modification de l'histoire</h1>
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
                            <img src="../public/uploads/stories/<?= $story->id_stories ?>.jpg" class="coverLandscape img-fluid" alt="Image de couverture">
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
                            <input type="text" class="form-control" id="title" name="title" value="<?= $story->title ?>" required>
                            <small class="text-danger fst-italic mt-2"><?= $errors['title'] ?? '' ?></small>
                        </div>

                        <!-- AUTEUR -->
                        <div class="d-flex flex-column align-items-center my-5">
                            <label for="author" class="form-label mb-2">Auteur :</label>
                            <input type="text" class="form-control" id="author" name="author" value="<?= $story->author ?>">
                            <small class="text-danger fst-italic mt-2"><?= $errors['author'] ?? '' ?></small>
                        </div>

                        <!-- CHOISIR LE TYPE -->
                        <div class="mb-5">
                            <label class="d-flex justify-content-center">Type * :</label>
                            <div class="d-flex flex-column flex-lg-row justify-content-center mt-4">
                                <div class="d-inline d-flex align-items-center me-5 mb-4 mb-lg-0">
                                    <input type="radio" name="type" value="1" id="linear" class="form-check-input me-2" required <?= ($story->type == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="linear">Linéaire</label>
                                </div>
                                <div class="ps-lg-3 d-inline d-flex align-items-center mb-4 mb-lg-0">
                                    <input type="radio" name="type" value="2" id="interactive" class="form-check-input me-2" required <?= ($story->type == 2) ? 'checked' : ''; ?>>
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
                                        $storyCategories = explode(',', $story->id_categories);
                                        foreach (array_combine($categoriesId, $categories) as $id => $category) {
                                            $isChecked = (in_array($id, $storyCategories)) ? 'checked' : ''; ?>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="themeCategories[]" value="<?= $id ?>" id="<?= $category ?>" required <?= $isChecked ?>>
                                                <label class="form-check-label ms-3" for="<?= $category ?>"><?= $category ?></label>
                                            </div> <?php }
                                            } ?>
                                </div> <?php } ?>
                            <small class="text-danger fst-italic mt-2 mb-5"><?= $errors['themeCategories'] ?? '' ?></small>
                        </div>

                        <!-- SYNOPSIS -->
                        <div class="mb-3">
                            <label for="synopsis" class="form-label d-flex justify-content-center">Synopsis * :</label>
                            <textarea class="form-control" id="synopsis" name="synopsis" required><?= $story->synopsis ?></textarea>
                            <small class="text-danger fst-italic mt-2"><?= $errors['synopsis'] ?? '' ?></small>
                        </div>

                        <!-- BOUTON VALIDATION -->
                        <div class="d-flex justify-content-center my-5">
                            <button type="submit" class="btn py-2 px-5" name="storyForm">Valider</button>
                        </div>
                    </form>


                    <!-- TABLEAU QUI AFFICHE TOUS LES CHAPITRES ET LEURS SECTIONS -->
                    
                    <?php 
                    foreach ($chapters as $chapter) { ?>
                        <table class="table align-middle table-striped table-hover my-5">
                            <thead>
                                <form method="POST">
                                    <tr>
                                        <th scope="col"><input type="number" class="form-control updateInput indexInput" name="index" value="<?= $chapter->index ?>"></th>
                                        <th scope="col">
                                            <h2>
                                                <input type="text" class="form-control updateInput fs-3" name="chapterTitle" value="<?= $chapter->title ?>">
                                                <input type="hidden" name="chapterId" value="<?= $chapter->id_chapters ?>">
                                            </h2>
                                        </th>
                                        
                                        <th scope="col">id de section</th>
                                        <th scope="col">sections parentes</th>
                                        <th scope="col">sections enfants</th>
                                        <th scope="col" class="d-flex justify-content-end">
                                            <button type="submit" class="btn edit py-2 px-4 me-3" title="Editer le chapitre"><i class="bi bi-pen"></i></button>
                                            <!-- Bouton supprimer -->
                                            <a href="" class="btn delete py-2 px-4" title="Supprimer le chapitre et ses sections" data-id="<?= $chapter->id_chapters ?>" data-deleteparam="5" data-bs-toggle="modal" data-bs-target="#deleteChapterSection">
                                                <i class="bi bi-trash3" data-id="<?= $chapter->id_chapters ?>" data-deleteparam="5"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </form>
                            </thead>

                            <tbody class="table-group-divider">
                                <?php 
                                $count = 1;
                                $sections = Section_Section::getAll($chapter->id_chapters);
                                foreach ($sections as $section) { ?>
                                    <tr>
                                        <th scope="row"><?= $count++ ?></th>
                                        <td>
                                            <h3 class="fs-5"><?= $section->title ?></h3>
                                        </td>
                                        <td><span><?= $section->id_sections ?></span></td>
                                        <td><?= $section->id_sections_parent ?></td>
                                        <td><?= $section->id_sections_child ?></td>
                                        <td class="d-flex justify-content-end">
                                            <a href="../../controllers/sections_update_controller.php?id=<?= $section->id_sections ?>&chapter=<?= $chapter->id_chapters ?>&story=<?= $idStory ?>" class="btn edit py-2 px-4 me-3" title="Editer la section">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            <!-- Bouton supprimer -->
                                            <button type="button" class="btn delete py-2 px-4" title="Supprimer la section" data-id="<?= $section->id_sections ?>" data-deleteparam="6" data-bs-toggle="modal" data-bs-target="#deleteChapterSection">
                                                <i class="bi bi-trash3" data-id="<?= $section->id_sections ?>" data-deleteparam="6"></i>
                                            </button>
                                        </td>
                                    </tr> <?php } ?>
                            </tbody>
                        </table> <?php } ?>

                </section>
            </div>
        </div>
    </div>
</main>


<!-- Modal -->
<div class="modal fade" id="deleteChapterSection" tabindex="-1" aria-labelledby="deleteChapterSection" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteChapterSection">Suppression d'un chapitre / section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes vous certain de vouloir supprimer ce chapitre ou cette section ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn py-2 px-4 me-4" data-bs-dismiss="modal" id="resetBtn">Annuler</button>
                <button type="button" class="btn py-2 px-4"><a class="link-light" id="deleteLink">Valider</a></button>
            </div>
        </div>
    </div>
</div>