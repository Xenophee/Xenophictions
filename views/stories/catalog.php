<main>
    <div class="container-fluid">

        <!-- NAVIGATION PAR THEME -->
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center mt-5 pt-5">
                    <h1 class="text-center"><?= $h1 ?? '' ?></h1>
                </div>
            </div>
        </div>

        <div class="row my-4 my-md-5">
            <div class="col-12 col-md-4 my-2 my-lg-5">
                <div class="d-flex justify-content-center fantasticTheme text-light py-5 my-lg-5">
                    <h2>Fantastique</h2>
                </div>
            </div>
            <div class="col-12 col-md-4 my-2 my-lg-5">
                <div class="d-flex justify-content-center scienceFictionTheme text-light py-5 my-lg-5">
                    <h2>Science-Fiction</h2>
                </div>
            </div>
            <div class="col-12 col-md-4 my-2 my-lg-5">
                <div class="d-flex justify-content-center fantasyTheme text-light py-5 my-lg-5">
                    <h2>Fantasy</h2>
                </div>
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
                                    <?= $story->synopsis ?>
                                    <!-- <p class="mx-3 mx-md-5 mx-lg-0">Lorem ipsum dolor sit
                                amet. Cum harum quam est voluptas assumenda eum quia atque aut
                                fugit labore quo pariatur reprehenderit.
                                Id itaque omnis ab quia rerum non omnis explicabo quo soluta
                                repudiandae a laborum corrupti. Est sunt laudantium nam dolores
                                consequatur rem magni blanditiis aut possimus odio.</p>
                            <p class="mx-3 mx-md-5 mx-lg-0">Eos necessitatibus esse
                                est quasi autem qui architecto ipsum quo tempora quis ea dolores
                                consectetur.
                                Hic laborum facere quo suscipit tenetur qui culpa velit aut
                                expedita fugiat. Aut dolore tempore eos voluptatem
                                nihil et repellat velit est quidem quia qui illum veritatis in
                                possimus veritatis.</p> -->
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

            <!-- <article class="d-flex mx-auto">
                <div class="row story align-items-center align-items-lg-stretch mb-5 g-0">
                    <div class="col-12 col-lg-5 col-xl-4 coverCard">
                        <img src="../public/assets/img/originImg/fantasy_warrior_2-wallpaper-1600x900.jpg" class="img-fluid coverImg" alt="...">
                        <div class="d-flex justify-content-center align-items-center note">8/10</div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-7 mx-auto d-flex align-items-center">
                        <div class="px-lg-5 pt-5 pb-3 mx-lg-5 mt-5 mt-lg-0">
                            <div class="d-flex align-items-center justify-content-between mt-3 mt-lg-0 mx-3 mx-md-5 mx-lg-0">
                                <small>Publié le 04/03/2023</small>
                                <img src="../public/assets/img/others/sorcier.png" alt="" class="img-fluid themeIcone">
                            </div>
                            <div class="progress mx-2 mx-md-5 mx-lg-0 mt-4 mb-5" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 50%">50%</div>
                            </div>
                            <h3 class="text-center mt-4 mt-lg-3 mb-5">Titre de l'œuvre</h3>
                            <p class="mx-3 mx-md-5 mx-lg-0">Lorem ipsum dolor sit
                                amet. Cum harum quam est voluptas assumenda eum quia atque aut
                                fugit labore quo pariatur reprehenderit.
                                Id itaque omnis ab quia rerum non omnis explicabo quo soluta
                                repudiandae a laborum corrupti. Est sunt laudantium nam dolores
                                consequatur rem magni blanditiis aut possimus odio.</p>
                            <p class="mx-3 mx-md-5 mx-lg-0">Eos necessitatibus esse
                                est quasi autem qui architecto ipsum quo tempora quis ea dolores
                                consectetur.
                                Hic laborum facere quo suscipit tenetur qui culpa velit aut
                                expedita fugiat. Aut dolore tempore eos voluptatem
                                nihil et repellat velit est quidem quia qui illum veritatis in
                                possimus veritatis.</p>
                            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-lg-end mt-4 mt-lg-5">
                                <span class="badge categoryInfo mb-2 me-md-2">Héroic-Fantasy</span>
                                <span class="badge categoryInfo mb-2 me-md-2">Fantasy Mythique</span>
                                <span class="badge categoryInfo mb-2 me-md-2">Epique</span>
                            </div>
                            <div class="d-flex justify-content-center justify-content-lg-end pt-xxl-4 mt-4 mb-5">
                                <a href="" class="btn">Continuer la lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <article class="d-flex mx-auto">
                <div class="row story align-items-center align-items-lg-stretch mb-5 g-0">
                    <div class="col-12 col-lg-5 col-xl-4 coverCard">
                        <img src="../public/assets/img/originImg/05e34f7bfyhne5vg.jpg" class="img-fluid coverImg" alt="...">
                        <div class="d-flex justify-content-center align-items-center note">5/10</div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-7 mx-auto d-flex align-items-center">
                        <div class="px-lg-5 pt-5 pb-3 mx-lg-5 mt-5 mt-lg-0">
                            <div class="d-flex align-items-center justify-content-between mt-3 mt-lg-0 mx-3 mx-md-5 mx-lg-0">
                                <small>Publié le 02/01/2023</small>
                                <img src="../public/assets/img/others/sorcier.png" alt="" class="img-fluid themeIcone">
                            </div>
                            <div class="progress mx-2 mx-md-5 mx-lg-0 mt-4 mb-5" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 0%">0%</div>
                            </div>
                            <h3 class="text-center mt-4 mt-lg-3 mb-5">Titre de l'œuvre</h3>
                            <p class="mx-3 mx-md-5 mx-lg-0">Lorem ipsum dolor sit
                                amet. Cum harum quam est voluptas assumenda eum quia atque aut
                                fugit labore quo pariatur reprehenderit.
                                Id itaque omnis ab quia rerum non omnis explicabo quo soluta
                                repudiandae a laborum corrupti. Est sunt laudantium nam dolores
                                consequatur rem magni blanditiis aut possimus odio.</p>
                            <p class="mx-3 mx-md-5 mx-lg-0">Eos necessitatibus esse
                                est quasi autem qui architecto ipsum quo tempora quis ea dolores
                                consectetur.
                                Hic laborum facere quo suscipit tenetur qui culpa velit aut
                                expedita fugiat. Aut dolore tempore eos voluptatem
                                nihil et repellat velit est quidem quia qui illum veritatis in
                                possimus veritatis.</p>
                            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-lg-end mt-4 mt-lg-5">
                                <span class="badge categoryInfo mb-2 me-md-2">High-Fantasy</span>
                                <span class="badge categoryInfo mb-2 me-md-2">Aventure</span>
                            </div>
                            <div class="d-flex justify-content-center justify-content-lg-end pt-xxl-4 mt-4 mb-5">
                                <a href="" class="btn">Découvrir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <article class="d-flex mx-auto">
                <div class="row story archived align-items-center align-items-lg-stretch mb-5 g-0">
                    <div class="col-12 col-lg-5 col-xl-4 coverCard">
                        <img src="../public/assets/img/originImg/thumb2-underwater-poster-2020-movie-science-fiction-horror.jpg" class="img-fluid coverImg" alt="...">
                        <div class="d-flex justify-content-center align-items-center note">9/10</div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-7 mx-auto d-flex align-items-center">
                        <div class="px-lg-5 pt-5 pb-3 mx-lg-5 mt-5 mt-lg-0">
                            <div class="d-flex align-items-center justify-content-between mt-3 mt-lg-0 mx-3 mx-md-5 mx-lg-0">
                                <small>Publié le 15/12/2022</small>
                                <img src="../public/assets/img/others/cyborg.png" alt="" class="img-fluid themeIcone">
                            </div>
                            <div class="progress mx-2 mx-md-5 mx-lg-0 mt-4 mb-5" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 100%"><i class="bi bi-check-lg"></i></div>
                            </div>
                            <h3 class="text-center mt-4 mt-lg-3 mb-5">Titre de l'œuvre</h3>
                            <p class="mx-3 mx-md-5 mx-lg-0">Lorem ipsum dolor sit
                                amet. Cum harum quam est voluptas assumenda eum quia atque aut
                                fugit labore quo pariatur reprehenderit.
                                Id itaque omnis ab quia rerum non omnis explicabo quo soluta
                                repudiandae a laborum corrupti. Est sunt laudantium nam dolores
                                consequatur rem magni blanditiis aut possimus odio.</p>
                            <p class="mx-3 mx-md-5 mx-lg-0">Eos necessitatibus esse
                                est quasi autem qui architecto ipsum quo tempora quis ea dolores
                                consectetur.
                                Hic laborum facere quo suscipit tenetur qui culpa velit aut
                                expedita fugiat. Aut dolore tempore eos voluptatem
                                nihil et repellat velit est quidem quia qui illum veritatis in
                                possimus veritatis.</p>
                            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-lg-end mt-4 mt-lg-5">
                                <span class="badge categoryInfo mb-2 me-md-2">Science-Fiction</span>
                                <span class="badge categoryInfo mb-2 me-md-2">Horreur</span>
                                <span class="badge categoryInfo mb-2 me-md-2">Mystère</span>
                            </div>
                            <div class="d-flex justify-content-center justify-content-lg-end pt-xxl-4 mt-4 mb-5">
                                <a href="" class="btn">Relire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article> -->

        </section>

    </div>
</main>