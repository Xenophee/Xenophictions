<main>
    <div class="container-fluid">
        <section>
            <div class="row justify-content-center">
                <div class="col-11 col-md-9 col-lg-7 d-flex justify-content-center">
                    <div class="text-center mb-5">
                        <h1 class="my-5">Transmettre une requête à l’entité</h1>
                        <p class="text-center">Une demande ou un problème spécifique semble vous assaillir tandis que vous arrivez au détroit des suppliques.
                            Le passeur sans visage attend sur la rive que vous lui transmettiez votre message ; vous savez qu’il est toujours possible de contacter
                            l’entité créatrice de l’autre monde, mais il faut remplir certaines formalités.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pb-5 mb-lg-5">
                <div class="col-12 col-sm-11 col-md-9 col-lg-6 col-xxl-5">
                    <div class="blocForm shadow-lg">
                        <form action="" method="post">
                            <fieldset class="py-5 px-3 px-sm-5">
                                <legend class="text-center mb-5">Contacter l'administrateur</legend>

                                <!-- CIVILITE -->
                                <label>Civilité * :</label>
                                <div class="mt-2 mb-4 d-flex justify-content-around justify-content-sm-start">
                                    <div class="d-inline d-flex align-items-center me-3">
                                        <input type="radio" name="civility" value="1" id="mr" class="form-check-input me-2">
                                        <label class="form-check-label" for="mr">M</label>
                                    </div>
                                    <div class="ps-3 d-inline d-flex align-items-center">
                                        <input type="radio" name="civility" value="2" id="mrs" class="form-check-input me-2">
                                        <label class="form-check-label" for="mrs">Mme</label>
                                    </div>
                                </div>

                                <!-- NOM D'UTILISATEUR -->
                                <div class="mb-4">
                                    <label for="username" class="form-label">Nom d'utilisateur / nom de famille * :</label>
                                    <input type="text" class="form-control" id="username" name="username" autocomplete="username" required>
                                </div>

                                <!-- ADRESSE MAIL -->
                                <div class="mb-4">
                                    <label for="email" class="form-label">Adresse mail * :</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" autocomplete="email" required>
                                </div>

                                <!-- OBJET -->
                                <div class="mb-4">
                                    <label for="object" class="form-label mb-2">Objet * :</label>
                                    <select class="form-select" id="object" name="object" required>
                                        <option value="" selected>-</option>
                                        <option value="1">Problème d'inscription ou de connexion au compte</option>
                                        <option value="2">Suggestion pour l'amélioration du site</option>
                                        <option value="3">Signaler un bug sur le site</option>
                                        <option value="4">Signaler des fautes ou des coquilles dans une histoire</option>
                                        <option value="5">Autre</option>
                                    </select>
                                </div>

                                <!-- MESSAGE -->
                                <div class="mt-4 mb-5">
                                    <label for="requestMessage" class="form-label">Votre message * :</label>
                                    <textarea class="form-control" id="requestMessage" name="requestMessage" required></textarea>
                                </div>

                                <!-- BOUTON -->
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn shadow px-5 py-2"><i class="bi bi-envelope me-3"></i>Soumettre</button>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>