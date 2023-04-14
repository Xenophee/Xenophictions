<main>
    <div class="container-fluid">
        <section>
            <div class="row justify-content-center">
                <div class="col-11 col-md-9 col-lg-7 d-flex justify-content-center">
                    <div class="text-center mb-5">
                        <h1 class="my-5">Entrer dans l'autre monde</h1>
                        <p class="text-center">Alors que vous arrivez au portail pour accéder à l’autre monde, un étrange gobelin muni
                            d’un registre se présente tout sourire devant vous.
                            Il vous invite à lui notifier certaines informations vous concernant afin de vous
                            enregistrer dans la guilde des lecteurs et vous autoriser le passage.</p>
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


            <div class="row justify-content-center pb-5 mb-lg-5">
                <div class="col-12 col-sm-11 col-md-9 col-lg-6 col-xxl-5">
                    <div class="blocForm shadow-lg">
                        <form method="post" id="userForm">
                            <fieldset class="py-5 px-2 px-sm-5">
                                <legend class="text-center mb-5">Créer un compte</legend>
                                <small class="text-danger fst-italic mb-2"><?= $errors['global'] ?? '' ?></small>
                                <div class="mb-4">
                                    <label for="username" class="form-label">Nom d'utilisateur * :</label>
                                    <input type="text" class="form-control" id="username" name="username" autocomplete="username" pattern="<?= REGEX_USER ?>" value="<?= htmlentities($username ?? '') ?>" required>
                                    <small class="text-danger fst-italic mt-2"><?= $errors['username'] ?? '' ?></small>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Adresse mail * :</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                        autocomplete="email" value="<?= htmlentities($email ?? '') ?>" required>
                                    <small class="text-danger fst-italic mt-2"><?= $errors['email'] ?? '' ?></small>
                                </div>
                                <div class="mb-4">
                                    <label for="birthdate" class="form-label">Date de naissance * :</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" autocomplete="bday" value="<?= htmlentities($birthdate ?? '') ?>" required>
                                    <small class="text-danger fst-italic mt-2"><?= $errors['birthdate'] ?? '' ?></small>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Mot de passe * :</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?= htmlentities($password ?? '') ?>" required>
                                    <small class="text-danger fst-italic password mt-2"><?= $errors['password'] ?? '' ?></small>
                                </div>
                                <div class="mb-5">
                                    <label for="confirmPassword" class="form-label">Confirmer le mot de passe *
                                        :</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?= htmlentities($confirmPassword ?? '') ?>" required>
                                    <small class="text-danger fst-italic password mt-2"><?= $errors['confirmPassword'] ?? '' ?></small>
                                </div>

                                <div class="mb-4 form-check d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input" id="cguAcceptation" name="cgu" value="1" <?= (isset($cgu) && $cgu == 1) ? 'checked' : '' ?> required>
                                    <label class="form-check-label ps-3" for="cguAcceptation">J'accepte les
                                        conditions générales
                                        d'utilisation *</label>
                                    <small class="text-danger fst-italic mb-4 mb-lg-0"><?= $errors['cgu'] ?? '' ?></small>
                                </div>
                                <div class="mb-5 form-check d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="1" id="newsletter" <?= (isset($newsletter) && $newsletter == 1) ? 'checked' : '' ?>>
                                    <label class="form-check-label ps-3" for="newsletter">Je m'inscris à la
                                        newsletter</label>
                                    <small class="text-danger fst-italic mb-4 mb-lg-0"><?= $errors['newsletter'] ?? '' ?></small>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn px-5 py-2"><i class="bi bi-person-vcard me-3"></i>Soumettre</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>