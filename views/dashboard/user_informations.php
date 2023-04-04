<main>
        <div class="container-fluid">
            <div class="row align-items-stretch">
            <?php
            include_once(__DIR__ . '/../templates/profil_navbar.php');
            ?>



                <div class="col-12 col-xl-10">
                    <section class="d-flex flex-column align-items-center px-md-5">
                        <div class="my-5">
                            <h1>Informations sur <?= $user->username ?></h1>
                        </div>

                        <img src="../public/assets/img/others/avatar.jpg" class="img-fluid avatar avatar-info my-5" alt="">

                        <ul>
                            <li class="mb-3"><span>Email :</span> <?= $user->email ?></li>
                            <li class="mb-3"><span>Date de naissance :</span> <?= date('d/m/Y', strtotime($user->birthdate)) ?></li>
                            <li class="mb-3"><span>Enregistré le :</span> <?= date('d/m/Y à H:i', strtotime($user->registered_at)) ?></li>
                            <li class="mb-3"><span>Actif depuis le :</span> <?php echo (!is_null($user->validated_at)) ? date('d/m/Y à H:i', strtotime($user->validated_at)) : 'Compte non validé'; ?></li>
                            <li class="mb-3"><span>Dernière connexion le :</span> <?php echo (!is_null($user->connected_at)) ? date('d/m/Y à H:i', strtotime($user->connected_at)) : 'Aucune connexion effectuée'; ?></li>
                            <li class="mb-3"><span>Dernière mise à jour de ses informations le :</span> <?php echo (!is_null($user->updated_at)) ? date('d/m/Y à H:i', strtotime($user->updated_at)) : 'Aucune mise à jour effectuée'; ?></li>
                            <li class="mb-5"><span>Inscrit à la newsletter :</span> <?php echo ($user->newsletter) ? 'Oui' : 'Non'; ?></li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </main>