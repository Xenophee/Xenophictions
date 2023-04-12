<main>
    <div class="container-fluid">
        <!-- PARTIE PRESENTATION -->
        <section>
            <div class="row presentation justify-content-center">
                <div class="d-flex flex-column justify-content-center align-items-center headerIndex mb-5">
                    <h1 class="text-center my-5">
                        Bienvenue sur Xénophictions
                    </h1>
                    <h2 class="text-center">Explorez des mondes imaginaires avec des histoires linéaires ou
                        interactives</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- TEXTE DE PRESENTATION -->
                <div class="col-12 col-lg-9">
                    <div class="d-flex justify-content-center my-5">
                        <img src="../public/assets/img/others/book.png" alt="Icone représentant un livre">
                    </div>

                    <hr class="mb-5">

                    <div class="d-flex flex-column flex-md-row justify-content-around align-items-center">
                        <div class="d-flex flex-wrap presentationIconContainer justify-content-center mb-4">
                            <img src="<?= THEME_ICON[1] ?>" class="presentationIcon me-3" alt="Icone du thème science-fiction">
                            <img src="<?= THEME_ICON[2] ?>" class="presentationIcon" alt="Icone du thème fantastique">
                            <img src="<?= THEME_ICON[3] ?>" class="presentationIcon" alt="Icone du thème fantasy">
                        </div>
                        <div class="presentationText">
                            <p>Parcourez la bibliothèque d'histoires en libre accès et laissez-vous emporter
                                dans des univers fantastiques, de science-fiction ou de fantasy.</p>
                        </div>
                    </div>

                    <hr class="mb-5">

                    <div class="d-flex flex-column flex-md-row justify-content-around align-items-center py-xl-5">
                        <div class="d-flex presentationIconContainer justify-content-center order-md-2 mb-4">
                            <img src="../public/assets/img/others/directons.png" class="presentationIcon" alt="Icone représentant plusieurs directions">
                        </div>
                        <div class="presentationText">
                            <p>Lisez des histoires linéaires en vous laissant transporté totalement par l'auteur ou
                                optez pour les récits interactifs où vous serez le maître de la destiné en choissant
                                la
                                voie à suivre et ou chaque histoire est unique.</p>
                        </div>
                    </div>

                    <hr class="mb-5">

                    <div class="d-flex flex-column flex-md-row justify-content-around align-items-center py-xl-5 mb-5">
                        <div class="presentationText order-md-2">
                            <p>Si vous n'êtes pas déjà inscrit, faites le dès maintenant pour bénéficier de toutes les fonctionnalités du site.
                                Commentez et notez vos histoires préférées, sauvegardez votre progression pour
                                continuer l'aventure plus tard et paramètrez vos préférences d'affichage pour un
                                meilleur confort de lecture !</p>
                        </div>
                        <div class="d-flex flex-column flex-wrap presentationIconContainer justify-content-center align-items-center order-md-1">
                            <img src="../public/assets/img/others/contract.png" class="presentationIcon mb-4" alt="Icone représentant une inscription">
                            <a href="../controllers/register_controller.php"><button type="button" class="btn px-5 py-2">S'inscrire</button></a>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- PARTIE DERNIERE PUBLICATION -->
        <section id="lastPublication" style="background-image: url('../public/uploads/stories/<?= $lastPublication->id_stories ?>.jpg')">
            <div class="row justify-content-evenly">

                <h2 class="text-center py-2 my-5">Dernière publication</h2>
                <div class="lastPublicationBanner d-flex justify-content-center align-items-center">
                    <h3 class="text-center"><?= ($lastPublication->type == 1) ? 'Récit linéaire' : 'Récit interactif'; ?></h3>
                </div>

                <!-- PRESENTATION TEXTUELLE DE L'OEUVRE -->
                <div class="col-12 col-lg-5 order-2 order-lg-1 mt-xl-5">
                    <div class=" py-5 px-3 px-md-5 px-lg-0">
                        <div class="describePart px-3 px-lg-5 py-5">
                            <h3 class="text-center mb-5 pb-4"><?= $lastPublication->title ?></h3>
                            <p><?= $lastPublication->synopsis ?>
                            </p>
                        </div>
                        <div class="d-flex justify-content-center justify-content-lg-end mt-5 my-lg-5">
                            <a href="../controllers/summary_controller.php?story=<?= $lastPublication->id_stories ?>" class="btn btnNew">Découvrir</a>
                        </div>
                    </div>
                </div>

                <!-- IMAGE DE COUVERTURE -->
                <div class="col-12 col-lg-4 col-xl-4 order-1 order-lg-2 ">
                    <div class="d-flex flex-column align-items-center infoType imgDiv py-5 mt-5">
                        <img src="<?= THEME_ICON[$lastPublication->id_theme] ?>" class="img-fluid mb-md-5" alt="">
                        <div class="d-flex flex-column justify-content-center categories mt-5">
                            <?php $categories = explode(',', $lastPublication->categories);
                            foreach ($categories as $category) { ?>
                                <span class="badge mb-2 mb-md-3"><?= $category ?></span> <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-- PARTIE RECOMMENDATIONS -->
        <section id="mostPopular">
            <div class="row recommendation">
                <h2 class="text-center my-5">Les plus populaires</h2>

                <!-- CAROUSEL -->
                <div id="carouselExampleIndicators" class="col carousel slide mb-5" data-bs-ride="true">
                    <!-- BOUTONS D'INDICATION SUR LE CAROUSEL -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner mb-5">



                        <!-- PREMIERE CARTE -->
                        <?php
                        $isFirst = true;
                        foreach ($mostPopular as $story) {
                            $activeClass = $isFirst ? 'active' : ''; // Ajouter la classe active si c'est le premier élément
                            $isFirst = false; // Mettre à jour l'indicateur
                        ?>
                            <div class="carousel-item <?= $activeClass ?>">
                                <div class="card mx-auto">
                                    <div class="row align-items-center align-items-lg-stretch g-0">
                                        <div class="col-12 col-lg-5 col-xl-5 coverCard">
                                            <img src="../public/uploads/stories/<?= $story->id_stories ?>.jpg" class="img-fluid coverImg" alt="...">
                                            <div class="d-flex justify-content-center align-items-center note"><?php
                                                                                                                $note = (is_null($story->note)) ? '-' : ceil($story->note);

                                                                                                                echo $note ?>/10
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-7 col-xl-7 d-flex align-items-center">
                                            <div class="card-body d-flex flex-column justify-content-between px-lg-5 mx-lg-5 mt-5 mt-lg-0 textContent">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <small>Publiée le <?= date('d/m/Y', strtotime($story->published_at)) ?></small>
                                                    <img src="<?= THEME_ICON[$story->id_theme] ?>" alt="Icone du thème <?= $story->theme_name ?>" title="Thème <?= $story->theme_name ?>" class="img-fluid themeIcone">
                                                </div>
                                                <div class="banner text-center mt-3 mb-5"><?= ($story->type == 1) ? 'Récit linéaire' : 'Récit interactif'; ?></div>
                                                <h3 class="card-title text-center mt-4 mt-lg-3 mb-5"><?= $story->title ?>
                                                </h3>
                                                <p class="card-text mx-1 ms-lg-0 me-lg-3"><?= $story->synopsis ?></p>

                                                <div class="d-flex flex-wrap flex-column flex-md-row justify-content-center justify-content-lg-start mt-5 mt-xl-5">
                                                    <?php $categories = explode(',', $story->categories);
                                                    foreach ($categories as $category) { ?>
                                                        <span class="badge mb-2 me-md-2"><?= $category ?></span> <?php } ?>
                                                </div>
                                                <div class="d-flex justify-content-center justify-content-lg-end pt-xxl-4 mt-4 mb-3">
                                                    <a href="../controllers/summary_controller.php?story=<?= $story->id_stories ?>" class="btn btnCarousel">Découvrir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <?php } ?>

                    </div>

                    <!-- FLECHES DU CAROUSEL -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span><i class="bi bi-caret-left previous" aria-hidden="true"></i></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span><i class="bi bi-caret-right next" aria-hidden="true"></i></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

    </div>
</main>