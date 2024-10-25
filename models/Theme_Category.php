<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Theme_Category
{

    private int $id_themes;
    private int $id_categories;

    /**
     * Permet de définir l'id du thème concerné
     * @param int $value
     * 
     * @return void
     */
    public function setIdThemes(int $value): void
    {
        $this->id_themes = $value;
    }

    /**
     * Permet de récupérer l'id du thème concerné
     * @param string $value
     * 
     * @return void
     */
    public function getIdThemes(): int
    {
        return $this->id_themes;
    }

    /**
     * Permet de définir l'id de la catégorie concernée
     * @param int $value
     * 
     * @return void
     */
    public function setIdCategories(int $value): void
    {
        $this->id_categories = $value;
    }

    /**
     * Permet de récupérer l'id de la catégorie concernée
     * @param string $value
     * 
     * @return void
     */
    public function getIdCategories(): int
    {
        return $this->id_categories;
    }

    public static function getAll(int $id = null): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT
        `themes`.`id_themes`, 
        `themes`.`name` AS `themes_name`, 
        `themes`.`description` AS `themes_description`, 
        GROUP_CONCAT(`categories`.`name`  SEPARATOR \', \') AS `categories_names`, 
        GROUP_CONCAT(`categories`.`description`  SEPARATOR \', \') AS `categories_descriptions`, 
        GROUP_CONCAT(`categories`.`id_categories`  SEPARATOR \', \') AS `id_categories`
        FROM `themes`
        LEFT JOIN `themes_categories` ON `themes`.`id_themes` = `themes_categories`.`id_themes`
        LEFT JOIN `categories` ON `categories`.`id_categories` = `themes_categories`.`id_categories`';

        if (!is_null($id)) {
            $sql .= ' WHERE `themes_categories`.`id_themes` = :theme;';
        }
        $sql .= 'GROUP BY `themes`.`id_themes` ORDER BY `themes`.`name`;';

        $sth = $pdo->prepare($sql);

        if (!is_null($id)) {
            $sth->bindValue(':theme', $id, PDO::PARAM_INT);
        }

        if ($sth->execute()) {
            return ($sth->fetchAll());
        }
    }

    /**
     * Permet d'ajouter des catégories à un thème
     * @return bool
     */
    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `themes_categories` (`id_themes`, `id_categories`) 
                VALUES (:id_themes, :id_categories);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_themes', $this->id_themes, PDO::PARAM_INT);
        $sth->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $sth->execute();
    }
}
