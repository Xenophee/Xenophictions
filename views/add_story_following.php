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
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8">
                                <hr class=" mt-5">
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
                                    <a href="../controllers/add_story-controller.php">
                                        <button type="button" class="btn shadow py-2" id="previous"><i class="bi bi-arrow-left me-3"></i>Retour</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-xl-2 mb-5">
                                <div>
                                    <a href="../controllers/add_story_following-controller.php">
                                        <button type="button" class="btn shadow py-2" id="next"><i class="bi bi-arrow-right me-3"></i>Continuer</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-xl-2 mb-5">
                                <div>
                                    <button type="submit" class="btn shadow py-2" id="finish"><i class="bi bi-bookmark-check me-3"></i>Terminer</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
</main>