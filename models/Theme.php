<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Theme {

    private int $id;
    private string $name;
    private string $description;

    /**
     * Permet de définir l'id du thème
     * @param int $value
     * 
     * @return void
     */
    public function setId (int $value):void {
        $this->id = $value;
    }

    /**
     * Permet de récupérer l'id du thème
     * @return int
     */
    public function getId ():int {
        return $this->id;
    }

    /**
     * Permet de définir le nom du thème
     * @param string $value
     * 
     * @return void
     */
    public function setName (string $value):void {
        $this->name = $value;
    }

    /**
     * Permet de récupérer le nom du thème
     * @return string
     */
    public function getName ():string {
        return $this->name;
    }

    /**
     * Permet de définir la description du thème
     * @param string $value
     * 
     * @return void
     */
    public function setDescription (string $value):void {
        $this->description = $value;
    }

    /**
     * Permet de récupérer la description du thème
     * @return string
     */
    public function getDescription ():string {
        return $this->description;
    }

    /**
     * Permet de récupérer tous les thèmes du site
     * @return array
     */
    public static function getAll():array {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `themes`;';
        $sth = $pdo->prepare($sql);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }

    /**
     * Permet d'ajouter un thème
     * @return bool
     */
    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `themes` (`name`) 
                VALUES (:name);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->name);
        return $sth->execute();
    }
    
    /**
     * Permet de modifier un thème
     * @param int $id
     * 
     * @return bool
     */
    public function update(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `themes` SET 
                        `name` = :name
                WHERE `id_themes` = :id;';

        // ,`description` = :description
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name', $this->name);
        // $sth->bindValue(':description', $this->description);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    /**
     * Permet de supprimer un thème
     * @param int $id
     * 
     * @return bool
     */
    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `themes`
                    WHERE `id_themes` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    /**
     * Permet de supprimer toutes les catégories d'un thème
     * @param int $id
     * 
     * @return bool
     */
    public static function deleteAll(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `categories` WHERE `id_categories` IN (
            SELECT `id_categories` FROM `themes_categories` WHERE `id_themes` = :id)';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
}