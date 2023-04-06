<main>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <?php
            include(__DIR__ . '/../templates/profil_navbar.php');
            ?>

            <div class="col-12 col-xl-10">
                <section class="d-flex flex-column align-items-center px-md-5">
                    <div class="my-5">
                        <h1 class="mb-5">Modération</h1>
                    </div>

                    <?php if (Flash::isExist()) { ?>
                        <div class="alert alert-dismissible fade show w-100 mt-5" role="alert">
                            <strong><?php echo Flash::getMessage();
                                    ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <?php foreach ($comments as $comment) {
                        if (is_null($comment->published_at)) { 
                            $username = (!is_null($comment->username)) ? $comment->username : 'un Gobelin'; ?>
                            <div class="comment py-4 px-4 mb-4">
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-start mb-3">
                                    <div class="d-flex flex-column flex-md-row align-items-center"><img src="../public/assets/img/others/avatar2.jpg" class="userAvatar mb-3 mb-md-0 me-md-3" alt="">
                                        <div>Par <span><?= $username ?></span></div>
                                    </div>
                                    <small class="mt-3 mt-md-0"><?= date('d/m/Y à H:i', strtotime($comment->sent_at)) ?></small>
                                </div>
                                <div class="commentary px-3 py-3">
                                    <p class="commentContent"><?= $comment->comment ?></p>
                                </div>

                                <div class="d-flex flex-column flex-md-row justify-content-end mt-3">
                                    <a href="../../controllers/delete_controller.php?id=<?= $comment->id_comments ?>&delete=2" class="btn stop mb-3 mb-md-0 me-3" id="cancel"><i class="bi bi-dash-circle me-3"></i>Supprimer</a>
                                    <a href="../../controllers/publication_controller.php?id=<?= $comment->id_comments ?>&publish=2" class="btn ok" id="send"><i class="bi bi-check2-circle me-3"></i>Valider</a>
                                </div>
                            </div> <?php }
                            } ?>


                </section>
            </div>
        </div>
    </div>
</main>