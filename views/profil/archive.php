<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>



            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column px-md-5">
                    <div class="my-5">
                        <h1 class="text-center">Historique</h1>
                    </div>

                    <div>
                        <h2 class="profilTitle mb-4">Lectures en cours</h2>
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-start">

                        <?php foreach($saves as $save) { 
                            $story = Story::get($save->id_stories); ?>
                            <div class="d-flex flex-column align-items-center currentStory py-3 me-md-5 mb-3">
                                <img src="../public/uploads/stories/<?=$story->id_stories ?>.jpg" class="img-fluid coverStory" alt="">
                                <h3 class="text-center my-4"><?= $story->title ?></h3>
                                <a href="../../controllers/section_controller.php?section=<?= $save->last_section ?>" class="btn btnRead">Continuer</a>
                            </div> <?php } ?>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h2 class="profilTitle mt-4 mb-4">Lectures achevées</h2>
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-start">
                            <div class="d-flex flex-column align-items-center ancientStory py-3 me-md-5 mb-3">
                                <img src="../public/assets/img/coverImgPortrait/dragon.jpg" class="img-fluid coverStory" alt="">
                                <h3 class="text-center my-4">Titre de l'oeuvre</h3>
                                <a href="" class="btn btnRead">Relire</a>
                            </div>
                            <div class="d-flex flex-column align-items-center ancientStory py-3 me-md-5 mb-3">
                                <img src="../public/assets/img/coverImgPortrait/dragon.jpg" class="img-fluid coverStory" alt="">
                                <h3 class="text-center my-4">Titre de l'oeuvre</h3>
                                <a href="" class="btn btnRead">Relire</a>
                            </div>
                            <div class="d-flex flex-column align-items-center ancientStory py-3 me-md-5 mb-3">
                                <img src="../public/assets/img/coverImgPortrait/dragon.jpg" class="img-fluid coverStory" alt="">
                                <h3 class="text-center my-4">Titre de l'oeuvre</h3>
                                <a href="" class="btn btnRead">Relire</a>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
</main>