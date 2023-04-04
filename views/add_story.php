<main>
    <div class="container-fluid">

        <!-- TITRE DE LA PAGE -->
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="mb-5">
                    <h1>Ajouter une histoire</h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10">
                <div>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <!-- TITRE DE L'OEUVRE -->
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6">
                                <div class="d-flex flex-column align-items-center py-5 mb-5">
                                    <label for="storyName" class="form-label mb-2">Titre de l'oeuvre :</label>
                                    <input type="text" class="form-control" id="storyName" name="storyName" required>
                                </div>
                            </div>
                        </div>

                        <!-- PARTIE VISUELLE -->
                        <div class="row justify-content-center">

                            <!-- IMAGE PORTRAIT -->
                            <div class="col-12 col-lg-6 d-flex flex-column align-items-center">
                                <div class="mb-5">
                                    <div class="d-flex justify-content-center mb-4">
                                        <img src="../public/assets/img/livresPortrait.jpg" class="coverPortrait img-fluid" alt="Image de couverture (portrait)">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn">
                                            <label class="form-label m-1" for="coverPortrait">Image de couverture
                                                (portrait) :</label>
                                            <input type="file" class="form-control d-none" id="coverPortrait" name="coverPortrait" accept="image/jpeg" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- IMAGE PAYSAGE -->
                            <div class="col-12 col-lg-6 d-flex flex-column align-items-center">
                                <div>
                                    <div class="d-flex justify-content-center mb-4">
                                        <img src="../public/assets/img/livresLandscape.jpg" class="coverLandscape img-fluid" alt="Image de couverture
                                            (paysage)">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn">
                                            <label class="form-label m-1" for="coverLandscape">Image de couverture
                                                (paysage) :</label>
                                            <input type="file" class="form-control d-none" id="coverLandscape" name="coverLandscape" accept="image/jpeg" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CHOISIR UN THEME -->
                        <div class="row justify-content-center mt-5">
                            <div class="col-12 col-lg-8">
                                <hr class=" mt-4 mb-5">
                                <div class="mb-3">
                                    <label class="d-flex justify-content-center">Thème * :</label>
                                    <div class="d-flex flex-column flex-lg-row justify-content-around mt-4 mb-5">
                                        <div class="d-inline d-flex align-items-center mb-4 mb-lg-0">
                                            <input type="radio" name="themeChoice" value="0" id="fantastic" class="form-check-input me-2">
                                            <label class="form-check-label" for="fantastic">Fantastique</label>
                                        </div>
                                        <div class="ps-lg-3 d-inline d-flex align-items-center mb-4 mb-lg-0">
                                            <input type="radio" name="themeChoice" value="1" id="scienceFiction" class="form-check-input me-2">
                                            <label class="form-check-label" for="scienceFiction">Science-Fiction</label>
                                        </div>
                                        <div class="ps-lg-3 d-inline d-flex align-items-center">
                                            <input type="radio" name="themeChoice" value="2" id="fantasy" class="form-check-input me-2">
                                            <label class="form-check-label" for="fantasy">Fantasy</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CHOISIR LES CATEGORIES -->
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8">
                                <div class="row">
                                    <div>
                                        <label class="d-flex justify-content-center mt-5 mb-4">Catégories * :</label>
                                    </div>
                                </div>

                                <div class="row justify-content-around">

                                    <!-- CATEGORIES SCIENCE-FICTION -->
                                    <div class="col-12 col-lg-4">
                                        <div class="d-flex flex-column justify-content-around mt-4 mb-5">
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="scienceFiction[]" value="0" id="alternate_history">
                                                <label class="form-check-label ms-3" for="alternate_history">Uchronie</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="scienceFiction[]" value="1" id="cyberpunk">
                                                <label class="form-check-label ms-3" for="cyberpunk">Cyberpunk</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="scienceFiction[]" value="2" id="space_opera_fantasy">
                                                <label class="form-check-label ms-3" for="space_opera_fantasy">Space
                                                    Opera /
                                                    Fantasy</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="scienceFiction[]" value="3" id="post_apo">
                                                <label class="form-check-label ms-3" for="post_apo">Post-Apocalyptique</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="scienceFiction[]" value="4" id="dystopia">
                                                <label class="form-check-label ms-3" for="dystopia">Dystopie</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="scienceFiction[]" value="4" id="steampunk">
                                                <label class="form-check-label ms-3" for="steampunk">Steampunk</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CATEGORIES FANTASY -->
                                    <div class="col-12 col-lg-4">
                                        <div class="d-flex flex-column justify-content-around mt-4 mb-5">
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="fantasy[]" value="0" id="high_fantasy">
                                                <label class="form-check-label ms-3" for="high_fantasy">High
                                                    Fantasy</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="fantasy[]" value="1" id="heroic_fantasy">
                                                <label class="form-check-label ms-3" for="heroic_fantasy">Héroïc
                                                    Fantasy</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="fantasy[]" value="2" id="dark_fantasy">
                                                <label class="form-check-label ms-3" for="dark_fantasy">Dark
                                                    Fantasy</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="fantasy[]" value="3" id="light_fantasy">
                                                <label class="form-check-label ms-3" for="light_fantasy">Light
                                                    Fantasy</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="fantasy[]" value="4" id="mythic_fantasy">
                                                <label class="form-check-label ms-3" for="mythic_fantasy">Fantasy
                                                    Mythique</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CATEGORIES GENERALES -->
                                    <div class="col-12 col-lg-4">
                                        <div class="d-flex flex-column justify-content-around mt-4 mb-5">
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="general[]" value="0" id="horror">
                                                <label class="form-check-label ms-3" for="horror">Horreur</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="general[]" value="1" id="detective">
                                                <label class="form-check-label ms-3" for="detective">Policier</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="general[]" value="2" id="mystic">
                                                <label class="form-check-label ms-3" for="mystic">Mystique</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="general[]" value="3" id="mystery">
                                                <label class="form-check-label ms-3" for="mystery">Mystère</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="general[]" value="4" id="humor">
                                                <label class="form-check-label ms-3" for="humor">Humour</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="general[]" value="4" id="adventure">
                                                <label class="form-check-label ms-3" for="adventure">Aventure</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mb-4 mb-lg-2">
                                                <input class="form-check-input" type="checkbox" name="general[]" value="4" id="epistolary">
                                                <label class="form-check-label ms-3" for="epistolary">Epistolaire</label>
                                            </div>
                                        </div>
                                    </div>



                                </div>


                                <hr class="mt-5">
                            </div>
                        </div>

                        <!-- CHAMP TEXTE -->
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column align-items-center mt-5 mb-3">
                                    <label for="textStory" class="form-label mb-3">Texte</label>
                                    <textarea class="form-control" id="textStory" name="textStory"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- SELECTIONNER LE NOMBRE DE CHOIX -->
                        <div class="row justify-content-center choicesPanel">
                            <div class="col-12 col-lg-8">
                                <hr class=" my-5">
                                <label class="d-flex justify-content-center">Nombre de choix * :</label>
                                <div class="d-flex justify-content-around mt-4 mb-5">
                                    <div class="d-inline d-flex align-items-center">
                                        <input type="radio" name="choicesNumber" id="twoChoice" class="form-check-input me-2">
                                        <label class="form-check-label" for="twoChoice">2</label>
                                    </div>
                                    <div class="ps-3 d-inline d-flex align-items-center">
                                        <input type="radio" name="choicesNumber" id="threeChoice" class="form-check-input me-2">
                                        <label class="form-check-label" for="threeChoice">3</label>
                                    </div>
                                    <div class="ps-3 d-inline d-flex align-items-center">
                                        <input type="radio" name="choicesNumber" id="fourChoice" class="form-check-input me-2">
                                        <label class="form-check-label" for="fourChoice">4</label>
                                    </div>
                                    <div class="ps-3 d-inline d-flex align-items-center">
                                        <input type="radio" name="choicesNumber" id="fiveChoice" class="form-check-input me-2">
                                        <label class="form-check-label" for="fiveChoice">5</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- NOMBRE DE CHOIX EN INPUT TEXTE -->
                        <div class="row justify-content-center choicesPanel">
                            <div class="col-12 col-lg-8">

                                <div class="d-flex flex-column align-items-center mb-4 px-lg-3">
                                    <label for="firstChoice" class="form-label mb-2">Choix 1 :</label>
                                    <input type="text" class="form-control" id="firstChoice" name="firstChoice" required>
                                </div>
                                <div class="d-flex flex-column align-items-center mb-4 px-lg-3">
                                    <label for="secondChoice" class="form-label mb-2">Choix 2 :</label>
                                    <input type="text" class="form-control" id="secondChoice" name="secondChoice" required>
                                </div>
                                <div class="d-flex flex-column align-items-center mb-4 px-lg-3">
                                    <label for="thirdChoice" class="form-label mb-2">Choix 3 :</label>
                                    <input type="text" class="form-control" id="thirdChoice" name="thirdChoice" required>
                                </div>
                                <div class="d-flex flex-column align-items-center mb-4 px-lg-3">
                                    <label for="fourthChoice" class="form-label mb-2">Choix 4 :</label>
                                    <input type="text" class="form-control" id="fourthChoice" name="fourthChoice" required>
                                </div>
                                <div class="d-flex flex-column align-items-center mb-4 px-lg-3">
                                    <label for="fifthChoice" class="form-label mb-2">Choix 5 :</label>
                                    <input type="text" class="form-control" id="fifthChoice" name="fifthChoice" required>
                                </div>
                                <hr class="my-5">
                            </div>
                        </div>

                        <!-- BOUTONS DE VALIDATION -->
                        <div class="row justify-content-evenly my-5">
                            <div class="col-12 col-lg-4 col-xl-2 mb-5">
                                <div>
                                    <a href="../controllers/add_story_following-controller.php">
                                        <button type="button" class="btn shadow py-2" id="next"><i class="bi bi-arrow-right me-3"></i>Continuer</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
</main>