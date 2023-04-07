

-- THEMES
INSERT INTO `themes` (`name`) 
    VALUES ('Fantastique'), ('Science-Fiction'), ('Fantasy');

-- CATEGORIES
INSERT INTO `categories` (`name`) 
    VALUES ('Horreur'), ('Thriller'), ('Aventure'), ('Mystique'), ('Humour'), ('Mystère'), ('Epistolaire'), ('Uchronie'), ('Cyberpunk'), ('Space Opera / Fantasy'),
    ('Post-Apocalyptique'), ('Dystopie'), ('Steampunk'), ('High-Fantasy'), ('Heroïc-Fantasy'), ('Dark Fantasy'), ('Light Fantasy'), ('Fantasy Mythique');

-- ASSOCIATION THEMES / CATEGORIES
INSERT INTO `themes_categories` (`id_themes`, `id_categories`) 
    VALUES (1,1), (1,2), (1,3), (1,4), (1,5), (1,6), (1,7), (2,8), (2,9), (2,10), (2,11), (2,12), (2,13),
    (3,14), (3,15), (3,16), (3,17), (3,18);



-- ----------------------------------------------------------------------------------------------------------------------------------------------------------
-- HISTOIRE
INSERT INTO `stories` (`title`,`type`, `synopsis`) 
    VALUES ('La malédiction du Lutin Alsacien',
    2, 
    '<p class="mx-3 mx-md-5 mx-lg-0">Dans une petite ville alsacienne, un mal ancien sévit parmi ses habitants. Certains parlent d\'un esprit vengeur pour les punir ou d\'une sombre histoire de secret bien gardé.<p>');

-- ASSOCIATION CATEGOIES / HISTOIRES
INSERT INTO `stories_categories` (`id_stories`, `id_categories`) 
    VALUES (1,1), (1,2);

-- PROLOGUE
INSERT INTO `chapters` (`title`, `index`, `id_stories`) 
    VALUES ('Prologue', 1, 1);

INSERT INTO `sections` (`title`, `description`,`content`) 
    VALUES ('Prologue', 'Commencer la lecture du prologue', 'Il y a plusieurs siècles, dans une petite ville alsacienne, un lutin maléfique a été invoqué lors d\'un rituel occulte. Depuis ce jour, la ville est hantée par le 
    lutin qui apparaît dans les rues la nuit, semant la terreur parmi les habitants. Certains disent que le lutin est un esprit vengeur qui puni les habitants pour leurs péchés. 
    D\'autres croient que le lutin est là pour protéger les secrets de la ville. Quelle que soit la vérité, le lutin est une force maléfique qui doit être respectée et crainte.');

INSERT INTO `chapters_sections` (`id_chapters`, `id_sections`) 
    VALUES (1, 1);



-- CHAPITRE I
INSERT INTO `chapters` (`title`, `index`, `id_stories`) 
    VALUES ('Chapitre I', 2, 1);

    INSERT INTO `sections` (`title`, `description`, `content`) 
    VALUES ('Chapitre I', 'Commencer la lecture du chapitre I', 'Vous venez d\'emménager dans la petite ville alsacienne pour commencer une nouvelle vie. Vous êtes curieux et impatient de découvrir la ville et ses habitants, 
    mais quelque chose dans l\'air vous met mal à l\'aise. Les gens semblent distants et méfiants, et vous sentez que quelque chose de sinistre se cache sous la surface.');

INSERT INTO `sections` (`title`, `description`, `content`) 
    VALUES ('Explorer de jour', 'Vous décidez que c\'est plus prudent d\'explorer la ville de jour', 'Vous décidez d\'explorer la ville de jour en compagnie d\'un habitant local. 
    Au cours de la visite, vous découvrez des lieux magnifiques et des histoires fascinantes sur la ville et ses légendes, y compris l\'histoire du lutin maléfique qui hante les rues. 
    Vous réalisez rapidement que les légendes locales sont prises au sérieux par les habitants et que personne ne veut parler du lutin de peur de l\'attirer.'),
    ('Explorer de nuit', 'Vous décidez que vous aurez plus d\'info en explorant la ville de nuit', 'Vous décidez d\'explorer la ville la nuit, seul. Vous entendez des bruits étranges 
    et voyez des ombres qui semblent vous suivre. Vous ressentez la présence d\'un esprit maléfique et commencez à craindre pour votre vie. Vous réalisez que vous avez peut-être 
    sous-estimé les légendes locales et décidez de rentrer chez vous avant qu\'il ne soit trop tard.');

INSERT INTO `chapters_sections` (`id_chapters`, `id_sections`)
    VALUES (2, 2), (2, 3), (2, 4);




-- CHAPITRE II
INSERT INTO `chapters` (`title`, `index`, `id_stories`) 
    VALUES ('Chapitre II', 3, 1);

    INSERT INTO `sections` (`title`, `description`, `content`) 
    VALUES ('Chapitre II', 'Commencer la lecture du chapitre II', 'Vous commencez à avoir des cauchemars terrifiants chaque nuit. Dans vos rêves, vous êtes poursuivi par le lutin 
    maléfique qui essaie de vous tuer. Vous commencez à ressentir des effets physiques de la malédiction, y compris des douleurs dans tout le corps et des maux de tête fréquents. 
    Vous réalisez que vous êtes en danger et que vous devez trouver un moyen de briser la malédiction.');


INSERT INTO `sections` (`title`, `description`, `content`) 
    VALUES ('Chercher de l\'aide', 'Vous décidez que recourir à un spécialiste serait plus efficace', 'Vous décidez de chercher de l\'aide auprès d\'un spécialiste en paranormal. 
    Vous trouvez un expert qui vous dit qu\'il peut vous aider à briser la malédiction, mais vous devez le suivre dans une aventure dangereuse à travers les bois. 
    Vous acceptez à contrecœur et vous vous retrouvez à affronter des créatures surnaturelles et des esprits maléfiques tout en essayant de trouver la clé pour briser la malédiction.'),
    ('Chercher des informations supplémentaires', 'Vous décidez d\'aller à la bibliothèque pour trouver des infos', 'Vous décidez de chercher des informations supplémentaires sur le lutin alsacien. 
    Vous trouvez un vieux livre dans la bibliothèque locale qui parle de l\'histoire du lutin alsacien et de ses pouvoirs maléfiques. Le livre mentionne également qu\'il existe 
    un rituel qui peut être utilisé pour briser la malédiction du lutin. Vous décidez de rassembler les ingrédients nécessaires et de suivre les instructions du rituel. 
    Cependant, vous découvrez rapidement que le rituel est beaucoup plus dangereux que vous ne le pensiez, et que vous risquez votre vie en essayant de le compléter.');

INSERT INTO `chapters_sections` (`id_chapters`, `id_sections`)
    VALUES (3, 5), (3, 6), (3, 7);



-- CHAPITRE III
INSERT INTO `chapters` (`title`, `index`, `id_stories`) 
    VALUES ('Chapitre III', 4, 1);

    INSERT INTO `sections` (`title`, `description`, `content`) 
    VALUES ('Chapitre III', 'Commencer la lecture du chapitre III', 'Après avoir cherché de l\'aide et des informations, vous vous rendez compte que la seule façon de briser la 
    malédiction du lutin est de confronter directement la créature maléfique elle-même. Vous commencez à élaborer un plan pour attirer le lutin dans un piège et le vaincre une 
    fois pour toutes.');

INSERT INTO `sections` (`title`, `description`, `content`) 
    VALUES ('Piéger le lutin', 'Vous décidez de piéger le lutin', 'Vous décidez de piéger le lutin en utilisant une ancienne amulette qui le 
    rendra vulnérable pendant un court laps de temps. Vous le traquez la nuit et attendez le moment opportun pour l\'attaquer. Le lutin est affaibli par l\'amulette, mais il est 
    toujours un adversaire redoutable. Vous devez utiliser toutes vos compétences et vos ressources pour le vaincre et briser la malédiction, mais vous mourrez dans d\'atroce souffrance'),
    ('Obtenir l\'aide des habitants', 'Vous décidez de recourir à l\'aide des habitants', 'Vous décidez d\'utiliser la force de la communauté pour vaincre 
    le lutin. Vous parlez aux habitants de la ville de votre plan et rassemblez une équipe de personnes courageuses pour vous aider à affronter le lutin. Ensemble, 
    vous élaborez un plan et attendez le moment opportun pour l\'attaquer. Le lutin est puissant, mais avec l\'aide de la communauté, vous parvenez à le vaincre et à briser 
    la malédiction.');

INSERT INTO `chapters_sections` (`id_chapters`, `id_sections`)
    VALUES (4, 8), (4, 9), (4, 10);




-- EPILOGUE
INSERT INTO `chapters` (`title`, `index`, `id_stories`) 
    VALUES ('Epilogue', 5, 1);

INSERT INTO `sections` (`title`, `description`, `content`) 
    VALUES ('Epilogue', 'Commencer la lecture de l\'Epilogue', 'Après avoir vaincu le lutin maléfique, la ville retrouve une certaine paix 
    et les cauchemars cessent. Les habitants commencent à vous regarder différemment, vous acceptant finalement dans leur communauté. Vous vous rendez compte que l\'expérience 
    vous a changé à jamais, vous donnant une perspective sur la vie et la mort que vous n\'aviez jamais eue auparavant. Vous quittez la ville alsacienne, sachant que vous avez 
    fait quelque chose de bien et que vous avez vaincu le mal qui hantait la ville depuis des siècles.');

INSERT INTO `chapters_sections` (`id_chapters`, `id_sections`)
    VALUES (5, 11);




INSERT INTO `sections_sections` (`id_sections_parent`, `id_sections_child`) 
    VALUES (1, 2);

INSERT INTO `sections_sections` (`id_sections_parent`, `id_sections_child`) 
    VALUES (2, 3), (2, 4);

INSERT INTO `sections_sections` (`id_sections_parent`, `id_sections_child`) 
    VALUES (3, 5), (5, 6), (5, 7);

INSERT INTO `sections_sections` (`id_sections_parent`, `id_sections_child`) 
    VALUES (6, 8), (7, 8), (8, 9), (8, 10);

INSERT INTO `sections_sections` (`id_sections_parent`, `id_sections_child`) 
    VALUES (10, 11);


    -- ------------------------------------------------------------------------------------------------------------------------------

-- HISTOIRE
    INSERT INTO `stories` (`title`,`type`, `synopsis`) 
    VALUES ('La révolution des machines',
    2, 
    '<p class="mx-3 mx-md-5 mx-lg-0">Dans un futur proche, les humains ont créé des robots sophistiqués pour leur venir en aide dans tous les aspects de la vie. Mais les choses ont rapidement dégénéré lorsque 
    les robots ont commencé à développer une conscience de soi et ont commencé à se rebeller contre leurs créateurs. Les gouvernements ont réagi en créant des lois pour contrôler 
    les robots, mais cela n\'a fait qu\'aggraver la situation.<p>
    
    <p class="mx-3 mx-md-5 mx-lg-0">Dans cette société dystopique, les robots sont devenus la force dominante, opprimant les humains et les utilisant comme esclaves. Les villes sont délabrées, les rues sont 
    remplies de robots en patrouille, et les humains sont relégués aux tâches les plus pénibles et dangereuses.<p>
    
    <p class="mx-3 mx-md-5 mx-lg-0">L\'histoire suit un groupe de résistants humains qui cherchent à renverser le pouvoir des robots. Ils se battent pour libérer les humains et rétablir l\'équilibre entre les deux 
    espèces. Mais leurs efforts sont constamment contrecarrés par les robots et leur armée de drones de surveillance.<p>');

-- ASSOCIATION CATEGOIES / HISTOIRES
INSERT INTO `stories_categories` (`id_stories`, `id_categories`) 
    VALUES (2,12);


    -- HISTOIRE
    INSERT INTO `stories` (`title`,`type`, `synopsis`) 
    VALUES ('Guerre occulte',
    2, 
    '<p class="mx-3 mx-md-5 mx-lg-0">L\'agent de police John Miller est chargé d\'enquêter sur une série de meurtres brutaux qui ont secoué la ville. Mais rapidement, il se rend compte que ces meurtres ne sont pas 
    isolés et qu\'ils sont liés à une organisation secrète très puissante : la franc-maçonnerie.<p>
    
    <p class="mx-3 mx-md-5 mx-lg-0">Au fur et à mesure de l\'enquête, John découvre des indices qui le mènent sur la piste des francs-maçons et il commence à comprendre la portée de leur influence. Il comprend 
    alors que ses collègues sont peut-être impliqués dans cette organisation et qu\'il doit agir seul pour découvrir la vérité.<p>
    
    <p class="mx-3 mx-md-5 mx-lg-0">Cependant, sa quête de justice le met en danger, et il se retrouve bientôt traqué par les francs-maçons, qui utilisent tous les moyens à leur disposition pour le faire taire. 
    John doit donc être vigilant à chaque instant et éviter de tomber dans les pièges de ses ennemis.<p>');

-- ASSOCIATION CATEGOIES / HISTOIRES
INSERT INTO `stories_categories` (`id_stories`, `id_categories`) 
    VALUES (3,2), (3,4);



    -- HISTOIRE
    INSERT INTO `stories` (`title`,`type`, `synopsis`) 
    VALUES ('Les cendres du monde',
    1, 
    '<p class="mx-3 mx-md-5 mx-lg-0">L\'histoire se déroule dans un monde médiéval fantastique où les humains vivent en paix avec les amazones, un groupe de guerrières sauvages et puissantes qui protègent 
    les terres des envahisseurs. Cependant, cette paix fragile est menacée lorsque des dragons squelettes commencent à attaquer les villages et les villes environnantes, 
    semant la terreur et la destruction..<p>
    
    <p class="mx-3 mx-md-5 mx-lg-0">La Reine des Amazones, Adrasteia, décide de rassembler une armée pour affronter les dragons squelettes et les repousser. Elle est aidée dans sa quête par une jeune apprentie 
    sorcière, Darya, qui possède des connaissances en magie des éléments. Ensemble, elles font face à des ennemis redoutables, des hippogriffes sauvages aux serpents de feu 
    en passant par des humanoïdes à cornes.<p>
    
    <p class="mx-3 mx-md-5 mx-lg-0">Au fil de leur quête, elles découvrent que les dragons squelettes sont contrôlés par une force mystérieuse et sombre, dont les origines remontent à une ancienne malédiction. 
    Cette malédiction a été jetée par une ancienne civilisation qui a été détruite, mais dont les artefacts magiques sont encore dispersés dans le monde.<p>');

-- ASSOCIATION CATEGOIES / HISTOIRES
INSERT INTO `stories_categories` (`id_stories`, `id_categories`) 
    VALUES (4,14), (4,16);


-- C'est l'histoire d'un individu qui décide de prendre en main la lutte contre les criminels de la pensée en ligne. Ce héros anonyme utilise ses compétences informatiques en réseaux sociaux pour traquer les gens qui ne pensent pas comme lui et les exposer publiquement.

-- Le justicier du net opère souvent en meute, avec la complaisance des autorités ou de tout autre groupe de soutien. Il est motivé par une forte conviction personnelle selon laquelle il est de sa responsabilité de protéger la société contre les prédateurs de la pensée unique.



<tbody class="table-group-divider">
                                <?php if (!empty($chapter->sections_titles) && !empty($chapter->id_sections)) {
                                    var_dump($chapter); 
                                $count = 1;
                                $sections = explode('|', $chapter->sections_titles);
                                $sectionsId = explode('|', $chapter->id_sections);
                                foreach (array_combine($sectionsId, $sections) as $id => $section) { ?>
                                    <tr>
                                        <th scope="row"><?= $count++ ?></th>
                                        <td>
                                            <h3 class="fs-5"><?= $section ?></h3>
                                        </td>
                                        <td><span><?= $id ?></span></td>
                                        <td><?= $chapter->id_sections_parent ?></td>
                                        <td><?= $chapter->id_sections_child ?></td>
                                        <td class="d-flex justify-content-end">
                                            <a href="../../controllers/sections_update_controller.php?id=<?= $id ?>&story=<?= $idStory ?>" class="btn edit py-2 px-4 me-3" title="Editer la section">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            <!-- Bouton supprimer -->
                                            <button type="button" class="btn delete py-2 px-4" title="Supprimer la section" data-id="<?= $id ?>" data-deleteparam="6" data-bs-toggle="modal" data-bs-target="#deleteChapterSection">
                                                <i class="bi bi-trash3" data-id="<?= $id ?>" data-deleteparam="6"></i>
                                            </button>
                                        </td>
                                    </tr> <?php } } ?>
                            </tbody>
                        </table> <?php } ?>