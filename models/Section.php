<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Section
{

    private int $id;
    private string $title;
    private string $description;
    private string $content;
    private string $registered_at;
    private string $published_at;
    private string $updated_at;
    private string $deleted_at;

    /**
     * Permet de définir l'id de la section
     * @param int $value
     * 
     * @return void
     */
    public function setId(int $value): void
    {
        $this->id = $value;
    }

    /**
     * Permet de récupérer l'id de la section
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Permet de définir le titre de la section
     * @param string $value
     * 
     * @return void
     */
    public function setTitle(string $value): void
    {
        $this->title = $value;
    }

    /**
     * Permet de récupérer le titre de la section
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Permet de définir la description de la section
     * @param string $value
     * 
     * @return void
     */
    public function setDescription(string $value): void
    {
        $this->description = $value;
    }

    /**
     * Permet de récupérer la description de la section
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Permet de définir le contenu de la section
     * @param string $value
     * 
     * @return void
     */
    public function setContent(string $value): void
    {
        $this->content = $value;
    }

    /**
     * Permet de récupérer le contenu de la section
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Permet de définir la date d'enregistrement de la section
     * @param string $value
     * 
     * @return void
     */
    public function setRegistered_at(string $value): void
    {
        $this->registered_at = $value;
    }

    /**
     * Permet de récupérer la date d'enregistrement de la section
     * @return string
     */
    public function getRegistered_at(): string
    {
        return $this->registered_at;
    }

    /**
     * Permet de définir la date de publication de la section
     * @param string $value
     * 
     * @return void
     */
    public function setPublished_at(string $value): void
    {
        $this->published_at = $value;
    }

    /**
     * Permet de récupérer la date de publication de la section
     * @return string
     */
    public function getPublished_at(): string
    {
        return $this->published_at;
    }

    /**
     * Permet de définir la date de modification de la section
     * @param string $value
     * 
     * @return void
     */
    public function setUpdated_at(string $value): void
    {
        $this->updated_at = $value;
    }

    /**
     * Permet de récupérer la date de modification de la section
     * @return string
     */
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    /**
     * Permet de définir la date de suppression de la section
     * @param string $value
     * 
     * @return void
     */
    public function setDeleted_at(string $value): void
    {
        $this->deleted_at = $value;
    }

    /**
     * Permet de récupérer la date de suppression de la section
     * @return string
     */
    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }

    public static function get(int $id):object
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `sections`.*, `chapters`.`title` AS `chapter_title`, `stories`.`title` AS `story_title`,
        `chapters`.`id_chapters`, `stories`.`id_stories`
        FROM `sections`
        JOIN `chapters_sections` ON `sections`.`id_sections` = `chapters_sections`.`id_sections`
        JOIN `chapters` ON `chapters_sections`.`id_chapters` = `chapters`.`id_chapters`
        JOIN `stories` ON `stories`.`id_stories` = `chapters`.`id_stories`
        WHERE `sections`.`id_sections` = :id';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetch());
        }
    }

    public static function getFirstSection($id)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `sections`.`id_sections`
        FROM `sections`
        JOIN `chapters_sections` ON `chapters_sections`.`id_sections` = `sections`.`id_sections`
        WHERE `id_chapters` = :id
        ORDER BY `sections`.`id_sections` ASC';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetch());
        }
    }

    public static function getLastSection($id)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `sections`.`id_sections`
        FROM `sections`
        JOIN `chapters_sections` ON `chapters_sections`.`id_sections` = `sections`.`id_sections`
        WHERE `id_chapters` = :id
        ORDER BY `sections`.`id_sections` DESC';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetch());
        }
    }

    // public static function getAll($id)
    // {
    //     $pdo = Database::getInstance();
    //     $sql = 'SELECT `chapters`.`id_chapters`, `chapters`.`title` AS `chapters_titles`, `chapters`.`index`, `chapters`.`summary` AS `chapter_summary`, `chapters`.`id_stories`,
    //     GROUP_CONCAT(DISTINCT `sections`.`title` ORDER BY `sections_sections`.`id_sections_parent` SEPARATOR \' | \') AS `sections_titles`,
    //     GROUP_CONCAT(DISTINCT `sections`.`id_sections` ORDER BY `sections_sections`.`id_sections_parent` SEPARATOR \' | \') AS `id_sections`,
    //     GROUP_CONCAT(DISTINCT `sections_sections`.`id_sections_parent` ORDER BY `sections_sections`.`id_sections_parent` SEPARATOR \' | \') AS `id_sections_parent`,
    //     GROUP_CONCAT(DISTINCT `sections_sections`.`id_sections_child` ORDER BY `sections_sections`.`id_sections_parent` SEPARATOR \' | \') AS `id_sections_child`
    //     FROM `chapters`
    //     LEFT JOIN `chapters_sections` ON `chapters`.`id_chapters` = `chapters_sections`.`id_chapters`
    //     LEFT JOIN `sections` ON `sections`.`id_sections` = `chapters_sections`.`id_sections`
    //     LEFT JOIN `sections_sections` ON `sections`.`id_sections` = `sections_sections`.`id_sections_parent`
    //     WHERE `chapters`.`id_stories` = :id
    //     GROUP BY `chapters`.`id_chapters`
    //     ORDER BY `chapters`.`index`;';
    
    //     $sth = $pdo->prepare($sql);
    //     $sth->bindValue(':id', $id, PDO::PARAM_INT);

    //     if ($sth->execute()) {
    //         return ($sth->fetchAll());
    //     }
    // }


    public static function getAll(int $id)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `sections`.*
        FROM `sections`
        LEFT JOIN `chapters_sections` ON `sections`.`id_sections` = `chapters_sections`.`id_sections`
        WHERE `chapters_sections`.`id_chapters` = :id
        ORDER BY `sections`.`id_sections`;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        }
    }

    public function add(): bool
    {
        $pdo = Database::getInstance();

        $sql = 'INSERT INTO `sections` (`title`, `description`, `content`) 
                VALUES (:title, :description, :content);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':description', $this->description, PDO::PARAM_INT);
        $sth->bindValue(':content', $this->content);

        return $sth->execute();
    }

    public function update(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `sections` SET 
                        `title` = :title,
                        `description` = :description,
                        `content` = :content,
                        `updated_at` = NOW()
                WHERE `id_sections` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':description', $this->description);
        $sth->bindValue(':content', $this->content);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `sections`
                    WHERE `id_sections` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }  
}

