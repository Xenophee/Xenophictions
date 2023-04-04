<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">

            <?php
            include_once(__DIR__ . '/../templates/profil_navbar.php');
            ?>

            <div class="col-12 col-xl-10">
                <section class="px-5">
                    <div class="my-5">
                        <h1 class="text-center pb-5">Thèmes & Catégories</h1>
                    </div>

                    <div class="d-flex align-items-start justify-content-around  py-5">
                        <form class="d-flex align-items-end mb-4" method="POST">
                            <div class="me-4">
                                <label for="newTheme" class="form-label mb-2">Ajouter un thème :</label>
                                <input type="text" class="form-control" id="newTheme" name="newTheme">
                            </div>
                            <div>
                                <button type="submit" class="btn btnSubmitThemeCategory py-2 px-4">Soumettre</button>
                            </div>
                        </form>

                        <form class="d-flex align-items-end" method="POST">
                            <div class="me-5">
                                <label for="parentTheme" class="form-label mb-2">Choisir le thème parent :</label>
                                <select class="form-select" name="parentTheme" id="parentTheme">
                                    <option>-</option>
                                    <?php foreach ($themes as $theme) {
                                        echo "<option value=\"$theme->id_themes\">$theme->name</option>";
                                    } ?>
                                </select>
                                <small class="text-danger fst-italic mt-2"><?= $error['parentTheme'] ?? '' ?></small>
                            </div>
                            <div class="me-4">
                                <label for="newCategory" class="form-label mb-2">Ajouter une catégorie :</label>
                                <input type="text" class="form-control" id="newCategory" name="newCategory">
                                <small class="text-danger fst-italic mt-2"><?= $error['newCategory'] ?? '' ?></small>
                            </div>
                            <div>
                                <button type="submit" class="btn btnSubmitThemeCategory py-2 px-4">Soumettre</button>
                            </div>
                        </form>
                    </div>



                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>


                    <?php foreach ($themesCategories as $key => $themeCategory) { ?>
                        <table class="table align-middle table-striped table-hover my-5">
                            <thead>
                                <form method="POST">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">
                                            <h2>
                                                <input type="text" class="form-control updateInput fs-3" name="theme" value="<?= $themeCategory->themes_name ?>">
                                                <input type="hidden" name="themeId" value="<?= $themeCategory->id_themes ?>">
                                            </h2>
                                        </th>
                                        <th scope="col" class="d-flex justify-content-end">
                                            <button type="submit" class="btn edit py-2 px-4 me-3" title="Editer le thème"><i class="bi bi-pen"></i></button>
                                            <!-- Bouton supprimer -->
                                            <a href="" class="btn delete py-2 px-4" title="Supprimer la catégorie" data-id="<?= $themeCategory->id_themes ?>" data-deleteparam="3" data-bs-toggle="modal" data-bs-target="#deleteThemeCategory">
                                                <i class="bi bi-trash3" data-id="<?= $themeCategory->id_themes ?>" data-deleteparam="3"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </form>
                            </thead>

                            <tbody class="table-group-divider">
                                <?php if (!is_null($themeCategory->categories_names) && !is_null($themeCategory->id_categories)) {
                                    $count = 1;
                                    $categories = explode(',', $themeCategory->categories_names);
                                    $categoriesId = explode(',', $themeCategory->id_categories);
                                    array_multisort($categories, SORT_ASC, $categoriesId);
                                    foreach (array_combine($categoriesId, $categories) as $id => $category) { ?>
                                        <tr>
                                            <form method="POST">
                                                <th scope="row"><?= $count++ ?></th>
                                                <td>
                                                    <input type="text" class="form-control updateInput" name="category" value="<?= $category ?>">
                                                    <input type="hidden" name="categoryId" value="<?= $id ?>">
                                                </td>
                                                <td class="d-flex justify-content-end">
                                                    <button type="submit" class="btn edit py-2 px-4 me-3" title="Editer la catégorie"><i class="bi bi-pen"></i></button>
                                                    <!-- Bouton supprimer -->
                                                    <a href="" class="btn delete py-2 px-4" title="Supprimer la catégorie" data-id="<?= $id ?>" data-deleteparam="2" data-bs-toggle="modal" data-bs-target="#deleteThemeCategory">
                                                        <i class="bi bi-trash3" data-id="<?= $id ?>" data-deleteparam="2"></i>
                                                    </a>
                                                </td>
                                            </form>
                                        </tr> <?php }
                                        } ?>
                            </tbody>
                        </table> <?php } ?>

                </section>
            </div>
        </div>
    </div>
</main>




<!-- Modal -->
<div class="modal fade" id="deleteThemeCategory" tabindex="-1" aria-labelledby="deleteThemeCategoryFromBase" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteThemeCategoryFromBase">Suppression d'un thème ou d'une catégorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes vous certain de vouloir supprimer ce thème ou cette catégorie ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn py-2 px-4 me-4" data-bs-dismiss="modal" id="resetBtn">Annuler</button>
                <button type="button" class="btn py-2 px-4"><a class="link-light" id="deleteLink">Valider</a></button>
            </div>
        </div>
    </div>
</div>