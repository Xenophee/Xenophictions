<main>
    <div class="container-fluid">

        <!-- IMAGE DE COUVERTURE -->
        <div class="row">
            <div class="col">
                <div>
                    <img src="../public/uploads/stories/<?= $section->id_stories ?>.jpg" alt="" class="img-fluid coverImg">
                </div>
            </div>
        </div>

        <div class="row justify-content-around mt-4">
            <div class="col-11 d-flex justify-content-between align-items-center">
                <a href="../../controllers/summary_controller.php?story=<?= $section->id_stories ?>" class="btn btnCharacters">Sommaire</a>
                <a href="" class="btn btnCharacters disabled">Personnages</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <hr class="my-5">
            </div>
        </div>

        <div class="row justify-content-center align-items-stretch">
            <div class="col-11 col-md-9 col-xl-7">
                <h1 class="text-center"><?= $section->story_title ?></h1>
                <h2 class="text-center my-5"><?= $section->chapter_title ?></h2>
                <p class="mb-5"><?= nl2br(html_entity_decode($section->content)) ?></p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <hr class="my-5">
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-11 col-md-8 d-flex flex-column align-items-center">
                <h4 class="mb-4"><?= (empty($sectionsChild)) ? 'Histoire terminée' : 'Quelle sera la suite ?';?></h4>
                <?php foreach($sectionsChild as $sectionChild) {
                    $isDisabled = (is_null($user) || in_array(true, $result, true)) ? 'disabled' : ''; ?>
                <a href="../../controllers/section_controller.php?section=<?= $sectionChild->id_sections ?>" class="btn btnChoice <?= $isDisabled ?> my-3"><?= $sectionChild->description ?></a>
                <?php } ?>
                <?= (!is_null($user)) ? '' : '<p class="text-center avert mt-4"><em>Pour lire la suite, veuillez vous inscrire et/ou vous connecter.</em></p>'; ?>
            </div>
        </div>

        <div class="row row justify-content-center">
            <div class="col-8">
                <hr class="my-5">
            </div>
        </div>


        <!-- <div class="row justify-content-center align-items-center">
            <div class="col-8 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link active" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div> -->

    </div>
</main>