<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Section_Section {

    private ?int $id_sections_parent = null;
    private ?int $id_sections_child = null;

    /**
     * Permet de définir l'id de la section parente
     * @param int $value
     * 
     * @return void
     */
    public function setId_sections_parent (int $value):void {
        $this->id_sections_parent = $value;
    }

    /**
     * Permet de récupérer l'id de la section parente
     * @return int
     */
    public function getId_sections_parent ():int {
        return $this->id_sections_parent;
    }

    /**
     * Permet de définir l'id de la section enfant
     * @param int $value
     * 
     * @return void
     */
    public function setId_sections_child (int $value):void {
        $this->id_sections_child = $value;
    }

    /**
     * Permet de récupérer l'id de la section enfant
     * @return int
     */
    public function getId_sections_child ():int {
        return $this->id_sections_child;
    }

    
    /**
     * Permet de récupérer les sections parentes à une autre section en particulier
     * @param int $id
     * 
     * @return array
     */
    public static function getSectionsParent(int $id):array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `sections`.*
        FROM `sections_sections`
        JOIN `sections` ON `sections`.`id_sections` = `sections_sections`.`id_sections_parent`
        WHERE `id_sections_child` = :id';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }

    /**
     * Permet de récupérer les sections enfants à une autre section en particulier
     * @param int $id
     * 
     * @return array
     */
    public static function getSectionsChild(int $id)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `sections`.*, `chapters_sections`.`id_chapters`
        FROM `sections_sections`
        JOIN `sections` ON `sections`.`id_sections` = `sections_sections`.`id_sections_child`
        JOIN `chapters_sections` ON `chapters_sections`.`id_sections` = `sections`.`id_sections`
        WHERE `id_sections_parent` = :id';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }

    public static function getAll(int $id): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `sections`.`id_sections`, `sections`.`title`, 
        GROUP_CONCAT(DISTINCT `sections_sections`.`id_sections_parent` ORDER BY `sections_sections`.`id_sections_parent` SEPARATOR \' | \') AS `id_sections_parent`,
        GROUP_CONCAT(DISTINCT `sections_sections`.`id_sections_child` ORDER BY `sections_sections`.`id_sections_parent` SEPARATOR \' | \') AS `id_sections_child`
        FROM `sections`
        LEFT JOIN `sections_sections` ON `sections`.`id_sections` = `sections_sections`.`id_sections_parent`
        LEFT JOIN `chapters_sections` ON `sections`.`id_sections` = `chapters_sections`.`id_sections`
        WHERE `chapters_sections`.`id_chapters` = :id
        GROUP BY `sections`.`id_sections`
        ORDER BY `sections`.`id_sections`;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }

    /**
     * Permet d'ajouter les liens entre sections
     * @return bool
     */
    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `sections_sections` (`id_sections_parent`, `id_sections_child`) 
                VALUES (:id_sections_parent, :id_sections_child);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_sections_parent', $this->id_sections_parent, PDO::PARAM_INT);
        $sth->bindValue(':id_sections_child', $this->id_sections_child, PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * Permet de supprimer les liens entre sections en fonction de la section enfant
     * @param int $id
     * 
     * @return bool
     */
    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `sections_sections`
                    WHERE `id_sections_child` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
}