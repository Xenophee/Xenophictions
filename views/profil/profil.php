<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>



            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-md-5">
                    <div class="my-5">
                        <h1>Mon compte</h1>
                    </div>

                    <form method="post" enctype="multipart/form-data" class="formProfil">

                        <fieldset>
                            <div class="d-flex justify-content-center mb-5">
                                <label class="form-label avatar m-1" for="avatar" title="Changer d'avatar" aria-label="Changer d'avatar"><img src="../public/assets/img/others/avatar.jpg" class="avatarImg rounded-circle img-fluid" alt="Avatar par défaut">
                                    <figcaption class="editAvatar">
                                        <i class="bi bi-image-fill"></i>
                                    </figcaption>
                                </label>
                                <input type="file" class="form-control d-none" id="avatar" accept="image/jpeg">
                            </div>
                        </fieldset>

                        <?php if (Flash::isExist()) { ?>
                            <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                                <strong><?php echo Flash::getMessage();
                                        ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <hr>

                        <fieldset>
                            <legend class="text-center mb-5">Informations générales</legend>
                            <div class="mb-4">
                                <label for="username" class="form-label me-3">Nom d'utilisateur :</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $username ?? $user->username ?>" required>
                                <div class="text-danger fst-italic mt-2"><?= $errors['username'] ?? '' ?></div>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label me-3">Adresse mail :</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?? $user->email ?>" required>
                                <div class="text-danger fst-italic mt-2"><?= $errors['email'] ?? '' ?></div>
                            </div>
                            <div class="mb-5">
                                <label for="birthdate" class="form-label me-3">Date de naissance :</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $birthdate ?? $user->birthdate ?>" required>
                                <div class="text-danger fst-italic mt-2"><?= $errors['birthdate'] ?? '' ?></div>
                            </div>
                        </fieldset>

                        <hr>

                        <fieldset>
                            <legend class="text-center mb-5">Changer de mot de passe</legend>
                            <div class="mb-4">
                                <label for="password" class="form-label mb-2">Mot de passe actuel :</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="text-danger fst-italic mt-2"><?= $errors['password'] ?? '' ?></div>
                            </div>
                            <div class="mb-4">
                                <label for="newPassword" class="form-label mb-2">Nouveau mot de passe :</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword">
                                <div class="text-danger fst-italic mt-2"><?= $errors['newPassword'] ?? '' ?></div>
                            </div>
                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label mb-2">Confirmer le mot de passe
                                    :</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                <div class="text-danger fst-italic mt-2"><?= $errors['confirmPassword'] ?? '' ?></div>
                            </div>
                        </fieldset>

                        <div class="my-5 form-check d-flex justify-content-center align-items-center">
                            <input type="checkbox" class="form-check-input" id="newsletter">
                            <label class="form-check-label ps-3" for="newsletter">Je m'inscris à la
                                newsletter</label>
                        </div>

                        <div class="d-flex justify-content-center my-5">
                            <button type="submit" class="btn px-5 py-2"><i class="bi bi-pencil-fill me-3"></i>Soumettre les modifications</button>
                        </div>

                        <div class="d-flex justify-content-center my-5">
                            <button type="button" class="btn btn-outline px-5 py-2" data-bs-toggle="modal" data-bs-target="#deleteUser"><i class="bi bi-x-octagon me-3"></i>Fermer le compte</button>
                        </div>
                    </form>
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
                <h1 class="modal-title fs-5" id="deleteUserFromBase">Suppression du compte</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes vous certain de vouloir supprimer votre compte ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn py-2 px-4 me-4" data-bs-dismiss="modal" id="resetBtn">Annuler</button>
                <button type="button" class="btn py-2 px-4"><a href="../../controllers/delete_controller.php?id=<?= $user->id_users ?>&delete=1" class="link-light" id="deleteLink">Valider</a></button>
            </div>
        </div>
    </div>
</div>