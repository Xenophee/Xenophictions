<?php

class Category {

    private int $id;
    private string $name;
    private string $description;

    /**
     * Permet de définir l'id de la catégorie
     * @param int $value
     * 
     * @return void
     */
    public function setId (int $value):void {
        $this->id = $value;
    }

    /**
     * Permet de récupérer l'id de la catégorie
     * @return int
     */
    public function getId ():int {
        return $this->id;
    }

    /**
     * Permet de définir le nom de la catégorie
     * @param string $value
     * 
     * @return void
     */
    public function setName (string $value):void {
        $this->name = $value;
    }

    /**
     * Permet de récupérer le nom de la catégorie
     * @return string
     */
    public function getName ():string {
        return $this->name;
    }

    /**
     * Permet de définir la description de la catégorie
     * @param string $value
     * 
     * @return void
     */
    public function setDescription (string|null $value):void {
        $this->description = $value;
    }

    /**
     * Permet de récupérer la description de la catégorie
     * @return string
     */
    public function getDescription ():string|null {
        return $this->description;
    }

    public static function getAll(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `categories`;';

        $sth = $pdo->prepare($sql);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    /**
     * Ajoute une nouvelle catégorie
     * @return bool
     */
    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `categories` (`name`, `description`) 
                VALUES (:name, :description);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->name);
        $sth->bindValue(':description', $this->description);
        return $sth->execute();
    }

    /**
     * Mets à jour une catégorie
     * @param int $id
     * 
     * @return bool
     */
    public function update(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `categories` SET 
                        `name` = :name, 
                        `description` = :description
                WHERE `id_categories` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name', $this->name);
        $sth->bindValue(':description', $this->description);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
    
    /**
     * Supprime une catégorie
     * @param int $id
     * 
     * @return bool
     */
    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `categories`
                    WHERE `id_categories` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
}