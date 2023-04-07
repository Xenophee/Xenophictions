<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>



            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-5">
                    <div>
                        <h1 class="text-center mt-5">Liste des histoires</h1>
                        <h2 class="text-center mt-5">En attente de publication</h2>
                    </div>

                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn" type="submit">Soumettre</button>
                    </form> -->

                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <!-- LISTE DES HISTOIRES EN ATTENTE DE PUBLICATION -->
                    <table class="table align-middle table-striped table-hover mt-5">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Titre</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date d'enregistrement</th>
                                <th scope="col">Thème</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($stories as $key => $story) {
                                if (is_null($story->published_at)) { ?>
                            <tr>
                                <th scope="row"><?= $key +1 ?></th>
                                <td><?= $story->title ?></td>
                                <td><?php echo ($story->type == 1) ? 'Linéaire' : 'Interactif'; ?></td>
                                <td><?= date('d/m/Y à H:i', strtotime($story->registered_at)) ?></td>
                                <td><?= $story->theme_name ?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="../../controllers/publication_controller.php?id=<?= $story->id_stories ?>&publish=1" class="btn view py-2 px-4 me-3" title="Publier l'histoire"><i class="bi bi-check2-circle"></i></a>
                                    <a href="../../controllers/stories_update_controller.php?id=<?= $story->id_stories ?>" class="btn edit py-2 px-4 me-3" title="Editer l'histoire"><i class="bi bi-pen"></i></a>
                                    <a href="" class="btn delete py-2 px-4" title="Supprimer l'histoire" data-id="<?= $story->id_stories ?>" data-deleteparam="4" data-bs-toggle="modal" data-bs-target="#deleteStory"><i class="bi bi-trash3" data-id="<?= $story->id_stories ?>" data-deleteparam="4"></i></a>
                                </td>
                            </tr> <?php } } ?>
                        </tbody>
                    </table>

                    <div class="mt-5">
                        <h2>Publiées sur le site</h2>
                    </div>

                    <!-- LISTE DES HISTOIRES PUBLIEES -->
                    <table class="table align-middle table-striped table-hover mt-5">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Titre</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date de publication</th>
                                <th scope="col">Thème</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach($stories as $key => $story) {
                                if (!is_null($story->published_at)) { ?>
                            <tr>
                                <th scope="row"><?= $key +1 ?></th>
                                <td><?= $story->title ?></td>
                                <td><?php echo ($story->type == 1) ? 'Linéaire' : 'Interactif'; ?></td>
                                <td><?= date('d/m/Y à H:i', strtotime($story->published_at)) ?></td>
                                <td><?= $story->theme_name ?></td>
                                <td class="d-flex justify-content-end">
                                    <!-- <a href="../../controllers/stories_update_controller.php?id=" class="btn view py-2 px-4 me-3" title="Consulter les détails"><i class="bi bi-eye"></i></a> -->
                                    <a href="../../controllers/stories_update_controller.php?id=<?= $story->id_stories ?>" class="btn edit py-2 px-4 me-3" title="Editer l'histoire"><i class="bi bi-pen"></i></a>
                                    <button type="button" class="btn delete py-2 px-4" title="Supprimer l'histoire" data-id="<?= $story->id_stories ?>" data-deleteparam="4" data-bs-toggle="modal" data-bs-target="#deleteStory"><i class="bi bi-trash3" data-id="<?= $story->id_stories ?>" data-deleteparam="4"></i></button>
                                </td>
                            </tr> <?php } } ?>
                        </tbody>
                    </table>

                    <?php
                    include_once(__DIR__ . '/../templates/pagination.php');
                    ?>
                </section>
            </div>
        </div>
    </div>
</main>


<!-- Modal -->
<div class="modal fade" id="deleteStory" tabindex="-1" aria-labelledby="deleteStoryFromBase" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteStoryFromBase">Suppression d'une histoire</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes vous certain de vouloir supprimer cette histoire ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn py-2 px-4 me-4" data-bs-dismiss="modal" id="resetBtn">Annuler</button>
                <button type="button" class="btn py-2 px-4"><a class="link-light" id="deleteLink">Valider</a></button>
            </div>
        </div>
    </div>
</div>