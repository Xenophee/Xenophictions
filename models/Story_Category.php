<?php

class Story_Category {

    private int $id_stories;
    private int $id_categories;

    public function setIdStories (int $value):void {
        $this->id_stories = $value;
    }

    public function getIdStories ():int {
        return $this->id_stories;
    }

    public function setIdCategories (int $value):void {
        $this->id_categories = $value;
    }

    public function getIdCategories ():int {
        return $this->id_categories;
    }

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