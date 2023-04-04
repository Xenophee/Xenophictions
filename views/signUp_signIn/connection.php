<main>
    <div class="container-fluid">
        <section>
            <!-- PRESENTATION -->
            <div class="row justify-content-center">
                <div class="col-11 col-md-9 col-lg-7 d-flex justify-content-center">
                    <div class="text-center mb-5">
                        <h1 class="my-5">Entrer à nouveau dans l'autre monde</h1>
                        <p class="text-center">Ravi de vous revoir, le gardien des clefs vous regarde tout
                            de
                            même d’un air suspicieux.
                            Il attend que vous décliniez votre identité ainsi que le mot de passe
                            correspondant
                            que vous avez décidé d’utiliser avec lui lors de
                            votre inscription.</p>
                    </div>
                </div>
            </div>

            <?php if (Flash::isExist()) { ?>
                <div class="d-flex justify-content-center mb-5">
                    <div class="alert alert-dismissible fade show mt-5" role="alert">
                        <strong><?php echo Flash::getMessage();
                                ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php } ?>

            <!-- FORMULAIRE DE CONNEXION -->
            <div class="row justify-content-center pb-5 mb-lg-5">
                <div class="col-12 col-sm-11 col-md-7 col-lg-6 col-xxl-5">
                    <div class="blocForm shadow-lg">
                        <form action="" method="post">
                            <fieldset class="py-5 px-2 px-sm-5">
                                <legend class="text-center mb-5">Se connecter</legend>

                                <?php if (Flash::isExist()) { ?>
                                    <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                                        <strong><?php echo Flash::getMessage();
                                                ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>

                                <!-- IDENTIFIANT -->
                                <div class="mb-4">
                                    <label for="email" class="form-label">Adresse mail
                                        :</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="email" value="<?= htmlentities($email ?? '') ?>" required>
                                    <small class="text-danger fst-italic mt-2"><?= $errors['email'] ?? '' ?></small>
                                </div>

                                <!-- MOT DE PASSE -->
                                <div class="mb-5">
                                    <label for="password" class="form-label">Mot de passe :</label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                                </div>

                                <!-- CONNEXION MAINTENUE -->
                                <div class="mb-5 form-check d-flex align-items-center justify-content-center">
                                    <input type="checkbox" class="form-check-input" id="stayConnect" name="stayConnect" value="1" <?= (isset($stayConnect) && $stayConnect == 1) ? 'checked' : '' ?>>
                                    <label class="form-check-label ps-3" for="stayConnect">Maintenir la connexion</label>
                                </div>
                                <small class="text-danger fst-italic mb-4"><?= $error['stayConnect'] ?? '' ?></small>

                                <div><a href="" class="forgotten">Mot de passe ou identifiants oubliés ?</a></div>

                                <!-- VALIDATION -->
                                <div class="d-flex justify-content-center mt-5">
                                    <button type="submit" class="btn py-2 px-5"><i class="bi bi-key me-3"></i>Soumettre</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>