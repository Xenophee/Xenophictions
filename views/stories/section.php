<main>
    <div class="container-fluid">

        <!-- IMAGE DE COUVERTURE -->
        <div class="row">
            <div class="col">
                <div>
                    <img src="../public/assets/img/originImg/01.jpg" alt="" class="img-fluid coverImg">
                </div>
            </div>
        </div>

        <div class="row justify-content-around mt-4">
            <div class="col-11 d-flex justify-content-between align-items-center">
                <a href="../../controllers/summary_controller.php?story=<?= $story ?>" class="btn btnCharacters">Sommaire</a>
                <a href="" class="btn btnCharacters">Personnages</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <hr class="my-5">
            </div>
        </div>

        <div class="row justify-content-center align-items-stretch">
            <div class="col-11 col-md-9 col-xl-7">
                <h1 class="text-center"><?= $informations->story_title ?></h1>
                <h2 class="text-center my-5"><?= $informations->chapter_title ?></h2>
                <p class="mb-5"><?= $section->content ?></p>
                
                <!-- <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, at! At deleniti saepe
                        fugiat
                        pariatur minus asperiores quisquam omnis, ipsum accusantium! Provident optio possimus
                        voluptatibus nemo ipsa cupiditate veritatis incidunt! Lorem ipsum, dolor sit amet consectetur
                        adipisicing elit. Minima atque beatae enim inventore nemo expedita animi fuga maxime delectus,
                        commodi itaque ratione soluta. Perspiciatis voluptatibus soluta, officia rem qui iure. Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Eveniet sequi eius dolore quaerat veritatis
                        at dicta adipisci ut tempora ipsam, impedit autem necessitatibus vero similique officiis
                        repellendus cum maiores voluptatem! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>

                    <p class="mb-5">
                        Iure amet, sequi nobis, in vero culpa magnam repellat laborum, ab quisquam id odio rem ex sed
                        minus at ipsa iusto. Similique. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae
                        eveniet optio a suscipit recusandae corporis ratione exercitationem iusto id illum, officiis
                        blanditiis consequatur non eaque dolore error quisquam perferendis iure! Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Maiores vitae architecto tempore quaerat adipisci incidunt,
                        dolores, excepturi ratione sit aspernatur ea debitis ipsam commodi molestiae voluptas quasi
                        reprehenderit. Eos, eum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis,
                        facere doloribus aliquam est laborum dignissimos delectus perferendis vitae facilis. Dignissimos
                        tenetur nostrum vel in a? In sequi nam error culpa.
                    </p>

                    <p class="mb-5">
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Vel aliquid nulla, vero, explicabo aperiam numquam, aut quas corrupti
                        consequuntur pariatur deleniti iure quis? Pariatur quis temporibus a libero illo alias. Lorem
                        ipsum dolor sit amet, consectetur adipisicing elit. Cum facilis rem fuga corrupti quo iusto
                        obcaecati fugit alias consequatur voluptate? Aspernatur cum voluptatibus consequatur quis
                        placeat veniam repellendus itaque distinctio? Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit. 
                    </p>

                    <p class="mb-5">
                        Optio odio doloremque natus totam vitae deserunt impedit enim veniam.
                        Perspiciatis dicta modi quia libero animi tempora nobis explicabo quae itaque aspernatur! Lorem
                        ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis atque harum aperiam dolorum
                        mollitia, quisquam consectetur accusantium ea incidunt hic, at amet voluptas repellat molestias
                        illum? Odio quaerat id quam!Lora Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero
                        ipsum inventore pariatur deserunt maxime mollitia magnam neque voluptatem laudantium nostrum
                        necessitatibus repellat, atque consequuntur, excepturi voluptas odit tenetur repudiandae nobis?
                    </p>

                    <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, at! At deleniti saepe
                        fugiat
                        pariatur minus asperiores quisquam omnis, ipsum accusantium! Provident optio possimus
                        voluptatibus nemo ipsa cupiditate veritatis incidunt! Lorem ipsum, dolor sit amet consectetur
                        adipisicing elit. Minima atque beatae enim inventore nemo expedita animi fuga maxime delectus,
                        commodi itaque ratione soluta. Perspiciatis voluptatibus soluta, officia rem qui iure. Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Eveniet sequi eius dolore quaerat veritatis
                        at dicta adipisci ut tempora ipsam, impedit autem necessitatibus vero similique officiis
                        repellendus cum maiores voluptatem! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>

                    <p class="mb-5">
                        Iure amet, sequi nobis, in vero culpa magnam repellat laborum, ab quisquam id odio rem ex sed
                        minus at ipsa iusto. Similique. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae
                        eveniet optio a suscipit recusandae corporis ratione exercitationem iusto id illum, officiis
                        blanditiis consequatur non eaque dolore error quisquam perferendis iure! Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Maiores vitae architecto tempore quaerat adipisci incidunt,
                        dolores, excepturi ratione sit aspernatur ea debitis ipsam commodi molestiae voluptas quasi
                        reprehenderit. Eos, eum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis,
                        facere doloribus aliquam est laborum dignissimos delectus perferendis vitae facilis. Dignissimos
                        tenetur nostrum vel in a? In sequi nam error culpa.
                    </p>

                    <p class="mb-5">
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Vel aliquid nulla, vero, explicabo aperiam numquam, aut quas corrupti
                        consequuntur pariatur deleniti iure quis? Pariatur quis temporibus a libero illo alias. Lorem
                        ipsum dolor sit amet, consectetur adipisicing elit. Cum facilis rem fuga corrupti quo iusto
                        obcaecati fugit alias consequatur voluptate? Aspernatur cum voluptatibus consequatur quis
                        placeat veniam repellendus itaque distinctio? Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit. 
                    </p>

                    <p class="mb-5">
                        Optio odio doloremque natus totam vitae deserunt impedit enim veniam.
                        Perspiciatis dicta modi quia libero animi tempora nobis explicabo quae itaque aspernatur! Lorem
                        ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis atque harum aperiam dolorum
                        mollitia, quisquam consectetur accusantium ea incidunt hic, at amet voluptas repellat molestias
                        illum? Odio quaerat id quam!Lora Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero
                        ipsum inventore pariatur deserunt maxime mollitia magnam neque voluptatem laudantium nostrum
                        necessitatibus repellat, atque consequuntur, excepturi voluptas odit tenetur repudiandae nobis?
                    </p> -->

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <hr class="my-5">
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-11 col-md-8 d-flex flex-column align-items-center">
                <h4 class="mb-4"><?= (empty($sectionChild->id_sections)) ? 'Vous avez échoué' : 'Quelle sera la suite ?';?></h4>
                <?php foreach($sectionsChild as $sectionChild) { ?>
                <a href="../../controllers/section_controller.php?section=<?= $sectionChild->id_sections ?>" class="btn btnChoice my-3"><?= $sectionChild->description ?></a>
                <?php } ?>
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