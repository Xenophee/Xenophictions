<main>
    <div class="container-fluid">

        <div class="row theme <?= $themeImg ?>">
            <div class="col">
                <div class="d-flex justify-content-center mt-5 pt-5">
                    <h1 class="text-center px-4 py-2"><?= $h1 ?? '' ?></h1>
                </div>
                <div class="d-flex justify-content-center mt-5 pt-5">
                    <h2><?= $themeTitle ?? '' ?></h2>
                </div>
            </div>
        </div>

        <!-- NAVIGATION PAR THEME -->
        <div class="row my-4 my-md-5">
            <div class="col d-flex flex-column flex-md-row flex-wrap justify-content-around themeChoice">
                <form class="d-flex justify-content-around align-items-center mb-3">
                    <input type="hidden" value="<?= $type ?>" name="type">
                    <input type="hidden" value="0" name="theme">
                    <button type="submit" class="btn btnChooseTheme <?= ($theme == false) ? 'disabled' : ''; ?>">Tout</button>
                </form>
                <form class="d-flex justify-content-around align-items-center mb-3">
                    <input type="hidden" value="<?= $type ?>" name="type">
                    <input type="hidden" value="1" name="theme">
                    <button type="submit" class="btn btnChooseTheme <?= ($theme == 1) ? 'disabled' : ''; ?>">Fantastique</button>
                </form>
                <form class="d-flex justify-content-around align-items-center mb-3">
                    <input type="hidden" value="<?= $type ?>" name="type">
                    <input type="hidden" value="2" name="theme">
                    <button type="submit" class="btn btnChooseTheme <?= ($theme == 2) ? 'disabled' : ''; ?>">Science-Fiction</button>
                </form>
                <form class="d-flex justify-content-around align-items-center mb-3">
                    <input type="hidden" value="<?= $type ?>" name="type">
                    <input type="hidden" value="3" name="theme">
                    <button type="submit" class="btn btnChooseTheme <?= ($theme == 3) ? 'disabled' : ''; ?>">Fantasy</button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10">
                <hr class="mb-5">
            </div>
        </div>


        <!-- CARTE -->
        <section>

            <?php foreach ($stories as $story) {
                if (!is_null($story->published_at)) { ?>
                    <article class="d-flex mx-auto">
                        <div class="row story align-items-center align-items-lg-stretch mb-5 g-0">
                            <div class="col-12 col-lg-5 col-xl-4 coverCard">
                                <img src="../public/uploads/stories/<?= $story->id_stories ?>.jpg" class="img-fluid coverImg" alt="...">
                                <div class="d-flex justify-content-center align-items-center note"><?php
                                                                                                    if (!is_null($story->note)) {
                                                                                                        // Arrondir le nombre à un chiffre après la virgule
                                                                                                        $note = round($story->note * 2) / 2;
                                                                                                        $note = number_format($note, 1, ',');
                                                                                                    } else {
                                                                                                        $note = '-';
                                                                                                    }

                                                                                                    echo $note ?>/10</div>
                            </div>
                            <div class="col-12 col-lg-7 col-xl-7 mx-auto d-flex align-items-center">
                                <div class="px-lg-5 pt-5 pb-3 mx-lg-5">
                                    <div class="d-flex align-items-center justify-content-between mt-3 mt-lg-0 mx-3 mx-md-5 mx-lg-0">
                                        <small>Publié le <?= date('d/m/Y', strtotime($story->registered_at)) ?></small>
                                        <img src="<?= THEME_ICON[$story->id_theme] ?>" alt="Icone du thème <?= $story->theme_name ?>" title="Thème <?= $story->theme_name ?>" class="img-fluid themeIcone">
                                    </div>
                                    <div class="progress mx-2 mx-md-5 mx-lg-0 mt-4 mb-5" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 25%">25%</div>
                                    </div>
                                    <h3 class="text-center mt-4 mt-lg-3 mb-5 mx-3 mx-md-5 mx-lg-0"><?= $story->title ?></h3>
                                    <p class="mx-3 mx-md-5 mx-lg-0"><?= $story->synopsis ?></p>
                                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-lg-end mt-4 mt-lg-5">
                                        <?php $categories = explode(',', $story->categories);
                                        foreach ($categories as $category) { ?>
                                            <span class="badge categoryInfo mb-2 me-md-2"><?= $category ?></span> <?php } ?>
                                    </div>
                                    <div class="d-flex justify-content-center justify-content-lg-end pt-xxl-4 mt-4 mb-5">
                                        <a href="../../controllers/summary_controller.php?story=<?= $story->id_stories ?>" class="btn">Lire</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article> <?php }
                        } ?>

                        <?php if (empty($stories)) { ?>
                            <p class="text-center pb-5">Il n'y a pas d'histoires dans ce thème pour le moment.</p>
                        <?php } ?>

        </section>

    </div>
</main>