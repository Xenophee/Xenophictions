

    <!-- MAIN -->
    <main>
        <div class="container-fluid">

            <!-- IMAGE DE COUVERTURE -->
            <div class="row">
                <div class="col">
                    <div>
                        <img src="../../public/uploads/stories/<?= $story ?>.jpg" alt="" class="img-fluid coverImg">
                    </div>
                </div>
            </div>

            <div class="row justify-content-around mt-4">
                <div class="col-11 d-flex justify-content-between align-items-center">
                    <a href="../../controllers/summary_controller.php?story=<?= $story ?>" title="Revenir au sommaire"><i class="bi bi-arrow-left"></i></a>
                    <a href="" class="btn btnCharacters disabled">Personnages</a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-8">
                    <hr class="my-5">
                </div>
            </div>

            <div class="row justify-content-center align-items-stretch">
                <div class="col">
                    <h1 class="text-center"><?= $informations->story_title ?></h1>
                    <h2 class="text-center pb-5 my-5"><?= $informations->chapter_title ?></h2>

                    <!-- SECTIONS -->
                    <?php if(empty($sections)) {?>
                    
                        <p class="text-center">Vous n'avez pas encore débloqué de section dans ce chapitre</p>
                    
                        <?php } else { 
                            foreach($sections as $section) { ?>
                        <article>
                        <div class="row justify-content-center my-5">
                            <div
                                class="col-12 col-md-11 col-lg-10 col-xl-7 progressionSection d-flex flex-column flex-md-row justify-content-between align-items-center py-2 px-4">
                                <h3><?= $section->section_title ?></h3>
                                <a href="../../controllers/section_controller.php?section=<?= $section->id_sections ?>&chapter=<?= $chapter ?>&story=<?= $story ?>" class="btn btnReading mt-3 mt-md-0"><i
                                        class="bi bi-book-fill me-3"></i>Relire</a>
                            </div>
                        </div>
                    </article> <?php } } ?>

                </div>
            </div>



            <div class="row row justify-content-center">
                <div class="col-8">
                    <hr class="my-5">
                </div>
            </div>


        </div>
    </main>
