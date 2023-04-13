<?php

class Story_Category {

    private int $id_stories;
    private int $id_categories;

    /**
     * Permet de définir l'id de l'histoire'
     * @param int $value
     * 
     * @return void
     */
    public function setIdStories (int $value):void {
        $this->id_stories = $value;
    }

    /**
     * Permet de récupérer l'id de l'histoire
     * @return int
     */
    public function getIdStories ():int {
        return $this->id_stories;
    }

    /**
     * Permet de définir l'id de la catégorie
     * @param int $value
     * 
     * @return void
     */
    public function setIdCategories (int $value):void {
        $this->id_categories = $value;
    }

    /**
     * Permet de récupérer l'id de la catégorie
     * @return int
     */
    public function getIdCategories ():int {
        return $this->id_categories;
    }


    /**
     * Permet d'ajouter le lien entre une histoire et des catégories
     * @return bool
     */
    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `stories_categories` (`id_stories`, `id_categories`) 
                VALUES (:id_stories, :id_categories);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_stories', $this->id_stories, PDO::PARAM_INT);
        $sth->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * Permet de supprimer le lien entre une histoire et des catégories selon l'id d'une histoire
     * @param int $id
     * 
     * @return bool
     */
    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `stories_categories`
                    WHERE `id_stories` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
}