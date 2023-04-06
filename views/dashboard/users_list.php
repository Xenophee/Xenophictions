<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">

            <?php
            include_once(__DIR__ . '/../templates/profil_navbar.php');
            ?>

            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-5">
                    <div class="my-5">
                        <h1>Liste des utilisateurs</h1>
                    </div>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn" type="submit">Soumettre</button>
                    </form>

                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <table class="table align-middle table-striped table-hover mt-5">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nom</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Date d'enregistrement</th>
                                <th scope="col">Actif</th>
                                <th scope="col">Newsletter</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($users as $key => $user) { ?>
                                <tr>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $user->username ?></td>
                                    <td><a href="mailto:<?= $user->email ?>"><?= $user->email ?></a></td>
                                    <td><?= date('d/m/Y à H:i', strtotime($user->registered_at)) ?></td>
                                    <td><?php echo (!is_null($user->validated_at)) ? 'Oui' : 'Non'; ?></td>
                                    <td><?php echo ($user->newsletter) ? 'Oui' : 'Non'; ?></td>
                                    <td class="d-flex justify-content-end">
                                        <a href="../../controllers/user_informations_controller.php?id=<?= $user->id_users ?>" class="btn view py-2 px-4 me-3" title="Consulter le profil"><i class="bi bi-eye"></i></a>
                                        <!-- <a href="" class="btn edit py-2 px-4 me-3" title="Editer le profil"><i class="bi bi-pen"></i></a> -->
                                        <!-- Bouton supprimer -->
                                        <button type="button" class="btn delete py-2 px-4" title="Supprimer l'utilisateur" data-id="<?= $user->id_users ?>" data-deleteparam="1" data-bs-toggle="modal" data-bs-target="#deleteUser">
                                            <i class="bi bi-person-dash" data-id="<?= $user->id_users ?>" data-deleteparam="1"></i>
                                        </button>
                                    </td>
                                </tr> <?php } ?>
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
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserFromBase" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserFromBase">Suppression d'un utilisateur</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes vous certain de vouloir supprimer cet utilisateur ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn py-2 px-4 me-4" data-bs-dismiss="modal" id="resetBtn">Annuler</button>
                <button type="button" class="btn py-2 px-4"><a class="link-light" id="deleteLink">Valider</a></button>
            </div>
        </div>
    </div>
</div>