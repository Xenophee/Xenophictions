<h1 align="center">Xénophictions</h1>

<img src="/preview.jpg" alt="Logo de l'application">

## Description du projet

Site personnel de lecture de fictions linéaires ou intéractives rédigées de ma main. Il s'agit du projet d'examen pour le titre professionnel de développeur web et web mobile en 2023.

Pour en savoir plus, vous pouvez consulter la page de mon [portfolio](https://perrine-dassonville.dev/portfolio/projet/xenophictions) dédiée au projet.


## Installation avec Laragon

1. **Télécharger et installer Laragon :**
    - Rendez-vous sur le site officiel de [Laragon](https://laragon.org/) et téléchargez la version appropriée pour votre système d'exploitation.
    - Installez Laragon en suivant les instructions fournies.


2. **Télécharger PHP et le configurer dans Laragon :**
    - Rendez-vous sur le site officiel de [PHP](https://www.php.net/downloads.php) et téléchargez la version 7.4.19 (ou supérieur) (x64) Thread Safe.
    - Extrayez le contenu de l'archive téléchargée dans le répertoire `bin\php` de Laragon (généralement `C:\laragon\bin\php`).
    - Renommez le répertoire extrait en `php-7.4.19`.
    - Ouvrez Laragon et allez dans `Menu > PHP > Version > php-7.4.19`.
    - Redémarrez Laragon pour appliquer les modifications.


3. **Cloner le dépôt du projet :**
    - Rendez vous vers le répertoire `www` de Laragon (généralement `C:\laragon\www`).
    - Clonez le dépôt du projet :
      ```sh
      git clone https://github.com/Xenophee/Xenophictions.git
      ```
      
4. **Mettre en place la base de données :**
    - Créez une base de données nommée `xenophictions`. 
    - Dans le dossier `resources` du projet, vous pouvez utiliser le script vierge `bdd.sql` qui ne réalise que la création de tables ou importer le fichier `xenophictions.sql` dans la base de données nouvellement créée.

Par défaut, Laragon propose HeidiSQL pour gérer les bases de données. Vous pouvez lancer l'application depuis le menu de Laragon. 
Si vous préférez phpMyAdmin, vous pouvez l'ajouter manuellement en le téléchargeant et en le plaçant dans le répertoire `C:\laragon\etc\apps`.
Redémarrez ensuite Laragon pour que les modifications soient prises en compte et accédez à phpMyAdmin depuis le menu de Laragon.

5. **Configurer l'accès à la base de données :**
    - Dans le dossier `config` du projet, rendez vous dans le fichier `constants.php` et renseignez les informations de connexion à la base de données pour qu'elles soient conforme à votre environnement de développement.


6. **Accéder au projet :**
   - Démarrer Laragon
   - Ouvrez votre navigateur et accédez à l'URL suivante :
     ```
     http://Xenophictions.test
     ```
    