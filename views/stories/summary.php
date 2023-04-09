<main>
        <div class="container-fluid">
            <!-- SECTION GENERALE -->
            <section>
                <div class="row justify-content-evenly mt-5 pt-5">
                    <div class="col-12 col-lg-10 col-xl-4 coverSection py-5 px-5">
                        <!-- IMAGE DE COUVERTURE -->
                        <div class="d-flex justify-content-center coverCard mb-5">
                            <img src="../public/uploads/stories/<?= $id ?>.jpg" class="coverImg img-fluid" alt="">
                            <div class="d-flex justify-content-center align-items-center note"><?= $note ?>/10</div>
                        </div>

                        <!-- DATE DE PUBLICATION -->
                        <div class="ref text-center pt-4 mb-4"><?= $date ?></div>

                        <!-- CATEGORIES -->
                        <div class="d-flex justify-content-center flex-wrap">
                        <?php 
                        $categories = explode(',', $story->categories);
                                foreach($categories as $category) { ?>
                            <span class="badge categoryInfo my-2 mx-2"><?= $category ?></span> <?php } ?>
                        </div>
                    </div>

                    <!-- TITRE ET RESUME -->
                    <div class="col-12 col-lg-10 col-xl-6 d-flex flex-column justify-content-around">
                        <div class="text-center mt-5 mt-xl-0 mb-5">
                            <h1><?= $story->title ?></h1>
                        </div>
                        <div class="mx-3">
                        <?= $story->synopsis ?>
                            <!-- <p>Lorem ipsum dolor sit amet. Non eius illum 33 animi dolorem est obcaecati debitis hic
                                dignissimos aliquid ut
                                voluptatibus quod aut nemo ipsam et quisquam nisi! Sed culpa amet in voluptate nobis qui
                                esse laudantium ut
                                autem quaerat et tempore sunt.</p>
                            <p>Est cupiditate blanditiis sit quis error ut maxime impedit et fuga quibusdam et
                                cupiditate
                                nisi. Ut nihil eaque
                                qui alias quia eum deserunt doloremque ut rerum consequatur non expedita dicta non
                                laboriosam unde est dolorem
                                delectus.</p>
                            <p>Ut quis cupiditate sed quibusdam quae sed numquam vero ut corrupti consectetur sit velit
                                explicabo eum corrupti
                                sapiente. Aut nihil internos qui voluptas ducimus eum cupiditate quod est velit
                                architecto.
                                Et earum sunt eos
                                modi vitae quo explicabo voluptas non ipsum eligendi et molestiae aliquam ab incidunt
                                sequi.
                                Ab vitae molestiae
                                et nulla galisum et commodi repellat?</p> -->
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-around align-items-center mt-4 mt-xl-0">
                            <a href="" class="btn" id="restart"><i
                                    class="bi bi-arrow-counterclockwise me-3"></i>Recommencer</a>
                            <a href="../../controllers/chapter_controller.php" class="btn mt-4 mt-md-0" id="read"><i class="bi bi-book-half me-3"></i>Continuer</a>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row justify-content-center">
                <div class="col-10">
                    <hr class="my-5">
                </div>
            </div>

            <!-- NAVIGATION SOMMAIRE / COMMENTAIRES -->
            <section class="mb-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-11 col-xl-8">
                        <div class="d-flex flex-column flex-md-row justify-content-between summaryNav my-md-5">
                            <h2 class="text-center navStory d-flex justify-content-center align-items-center active">
                                Sommaire</h2>
                            <h2 class="text-center navStory d-flex justify-content-center align-items-center">
                            Commentaires</h2>
                        </div>
                    </div>
                </div>

                <!-- SECTION SOMMAIRE -->
                <div class="row" id="summary">
                    <div class="col d-flex flex-column justify-content-center">

                        <!-- CHAPITRES -->
                        <?php foreach($chapters as $chapter) { ?>
                        <article>
                            <div class="row justify-content-center my-4">
                                <div
                                    class="col-12 col-md-11 col-lg-10 col-xl-7 progressionSection d-flex flex-column flex-md-row justify-content-between align-items-center py-2 px-4">
                                    <h3><?= $chapter->title ?></h3>
                                    <a href="../../controllers/chapter_controller.php?chapter=<?= $chapter->id_chapters ?>&story=<?= $id ?>" class="btn btnReading mt-3 mt-md-0"><i class="bi bi-book-fill me-3"></i>Lire</a>
                                </div>
                            </div>
                        </article> <?php } ?>

                        

                        <!-- RESUME ET PERSONNAGES -->
                        <article>
                            <div class="row justify-content-center my-5">
                                <div
                                    class="col-12 col-md-11 col-lg-10 col-xl-7 progressionSection d-flex flex-column flex-md-row justify-content-between align-items-center py-2 px-4">
                                    <h3>Personnages</h3>
                                    <div class="mt-3 mt-md-0">Éléments débloqués : 3/21</div>
                                    <a href="" class="btn btnReading mt-3 mt-md-0"><i class="bi bi-eye me-3"></i>Consulter</a>

                                </div>
                            </div>
                        </article>

                    </div>
                </div>

                <!-- SECTION COMMENTAIRES -->
                <div class="row justify-content-center d-none" id="comments">
                    <div class="col-11 col-lg-10 col-xl-7">

                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    
                    <?php if (!empty($user)) { ?>
                        <div class="comment py-4 px-4">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-start mb-3">
                                <div class="d-flex flex-column flex-md-row align-items-center"><img src="../../public/assets/img/others/avatar2.jpg" class="avatar mb-3 mb-md-0 me-md-3" alt="">
                                    <div>Par <span><?= $user->username ?></span></div>
                                </div>
                                <small class="mt-3 mt-md-0"><?= date('d/m/Y'); ?></small>
                            </div>
                            <form method="POST">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Écrire un commentaire" id="commentary"
                                        name="commentary"></textarea>
                                    <label for="commentary">Écrire un commentaire</label>
                                </div>

                                <div class="d-flex flex-column flex-md-row justify-content-end mt-3">
                                    <button type="reset" class="btn stop mb-3 mb-md-0 me-3"><i
                                            class="bi bi-eraser me-3"></i>Annuler</button>
                                    <button type="submit" class="btn ok"><i
                                            class="bi bi-arrow-right-circle me-3"></i>Envoyer</button>
                                </div>
                            </form>
                        </div> <?php } ?>

                        <?php foreach($comments as $comment) {
                            if(!is_null($comment->published_at)) {
                                $username = (!is_null($comment->username)) ? $comment->username : 'un Gobelin'; ?>
                        <hr>
                        <div class="comment py-4 px-4">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-start mb-3">
                                <div class="d-flex flex-column flex-md-row align-items-center"><img src="../../public/assets/img/others/avatar2.jpg" class="avatar mb-3 mb-md-0 me-md-3" alt="">
                                    <div>Par <span><?= $username ?></span></div>
                                </div>
                                <small class="mt-3 mt-md-0"><?= date('d/m/Y à H:i', strtotime($comment->published_at)) ?></small>
                            </div>
                            <form action="">
                                <div class="commentary px-3 py-3">
                                    <p class="commentContent"><?= $comment->comment ?></p>
                                </div>

                                <div class="d-flex flex-column flex-md-row justify-content-end mt-3">
                                    <!-- <button type="reset" class="btn stop mb-3 mb-md-0 me-3" id="cancel"><i
                                        class="bi bi-dash-circle me-3"></i>Supprimer</button> -->
                                    <!-- <button type="submit" class="btn ok" id="send"><i class="bi bi-pen me-3"></i>Modifier</button> -->
                                </div>
                            </form>
                        </div> <?php } } ?>

                    </div>
                </div>
            </section>

        </div>
    </main>


    <!-- Modal -->
<div class="modal fade" id="giveNote" tabindex="-1" aria-labelledby="giveNoteToStory" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="giveNoteToStory">Mettre une note</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Quelle note souhaitez vous attribuer ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn py-2 px-4 me-4" data-bs-dismiss="modal" id="resetBtn">Annuler</button>
                <button type="button" class="btn py-2 px-4"><a class="link-light" id="deleteLink">Valider</a></button>
            </div>
        </div>
    </div>
</div>