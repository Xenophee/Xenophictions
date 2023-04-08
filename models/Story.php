<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Story
{

    private int $id_stories;
    private string $title;
    private string $author = 'Xénophée';
    private int $type;
    private string $synopsis;
    private string $registered_at;
    private string $published_at;
    private string $updated_at;
    private string $deleted_at;

    /**
     * Permet de définir l'id de l'histoire
     * @param int $value
     * 
     * @return void
     */
    public function setId(int $value): void
    {
        $this->id_stories = $value;
    }

    /**
     * Permet de récupérer l'id de l'histoire
     * @return int
     */
    public function getId(): int
    {
        return $this->id_stories;
    }

    /**
     * Permet de définir le titre de l'histoire
     * @param string $value
     * 
     * @return void
     */
    public function setTitle(string $value): void
    {
        $this->title = $value;
    }

    /**
     * Permet de récupérer le titre de l'histoire
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Permet de définir l'auteur de l'histoire
     * @param string $value
     * 
     * @return void
     */
    public function setAuthor(string $value): void
    {
        $this->author = $value;
    }

    /**
     * Permet de récupérer l'auteur de l'histoire
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Permet de définir le type de l'histoire
     * @param int $value
     * 
     * @return void
     */
    public function setType(int $value): void
    {
        $this->type = $value;
    }

    /**
     * Permet de récupérer le type de l'histoire
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * Permet de définir le synopsys de l'histoire
     * @param string $value
     * 
     * @return void
     */
    public function setSynopsis(string $value): void
    {
        $this->synopsis = $value;
    }

    /**
     * Permet de récupérer le synopsys de l'histoire
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * Permet de définir la date d'enregistrement de l'histoire
     * @param string $value
     * 
     * @return void
     */
    public function setRegistered_at(string $value): void
    {
        $this->registered_at = $value;
    }

    /**
     * Permet de récupérer la date d'enregistrement de l'histoire
     * @return string
     */
    public function getRegistered_at(): string
    {
        return $this->registered_at;
    }

    /**
     * Permet de définir la date de publication de l'histoire
     * @param string $value
     * 
     * @return void
     */
    public function setPublished_at(string $value): void
    {
        $this->published_at = $value;
    }

    /**
     * Permet de récupérer la date de publication de l'histoire
     * @return string
     */
    public function getPublished_at(): string
    {
        return $this->published_at;
    }

    /**
     * Permet de définir la date de modification de l'histoire
     * @param string $value
     * 
     * @return void
     */
    public function setUpdated_at(string $value): void
    {
        $this->updated_at = $value;
    }

    /**
     * Permet de récupérer la date de modification de l'histoire
     * @return string
     */
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    /**
     * Permet de définir la date de suppression de l'histoire
     * @param string $value
     * 
     * @return void
     */
    public function setDeleted_at(string $value): void
    {
        $this->deleted_at = $value;
    }

    /**
     * Permet de récupérer la date de suppression de l'histoire
     * @return string
     */
    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }


    public static function getAll(int $type = null, int $limit = null, int $offset = 0): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `stories`.*, AVG(`note`) AS `note`, GROUP_CONCAT(`categories`.`name` SEPARATOR \', \') AS `categories`, MAX(`themes`.`name`) AS `theme_name`, MAX(`themes`.`id_themes`) AS `id_theme`
        FROM `stories`
        LEFT JOIN `stories_categories` ON `stories`.`id_stories` = `stories_categories`.`id_stories`
        LEFT JOIN `categories` ON `stories_categories`.`id_categories` = `categories`.`id_categories`
        LEFT JOIN `themes_categories` ON `stories_categories`.`id_categories` = `themes_categories`.`id_categories`
        LEFT JOIN `themes` ON `themes_categories`.`id_themes` = `themes`.`id_themes`
        LEFT JOIN `notes` ON `notes`.`id_stories` = `stories`.`id_stories`';

        if (!is_null($type)) {
            $sql .= ' WHERE `stories`.`type` = :type';
        }

        $sql .= ' GROUP BY `stories`.`id_stories`';

        if (!is_null($limit)) {
            $sql .= ' LIMIT :limit OFFSET :offset';
        }
        $sql .= ';';

        $sth = $pdo->prepare($sql);

        if (!is_null($type)) {
            $sth->bindValue(':type', $type, PDO::PARAM_INT);
        }

        if (!is_null($limit)) {
            $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
        }

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }

    public static function get(int $id): object|bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `stories`.*, AVG(`note`) AS `note`, GROUP_CONCAT(`categories`.`id_categories` SEPARATOR \', \') AS `id_categories`, GROUP_CONCAT(`categories`.`name` SEPARATOR \', \') AS `categories` FROM `stories`
        LEFT JOIN `stories_categories` ON `stories`.`id_stories` = `stories_categories`.`id_stories`
        LEFT JOIN `categories` ON `stories_categories`.`id_categories` = `categories`.`id_categories`
        LEFT JOIN `notes` ON `notes`.`id_stories` = `stories`.`id_stories`
        WHERE `stories`.`id_stories` = :id;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetch());
        }
    }

    public function add(): bool
    {
        $pdo = Database::getInstance();

        $sql = 'INSERT INTO `stories` (`title`, `author`, `type`, `synopsis`) 
                    VALUES (:title, :author, :type, :synopsis);';


        $sth = $pdo->prepare($sql);

        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':author', $this->author);
        $sth->bindValue(':type', $this->type, PDO::PARAM_INT);
        $sth->bindValue(':synopsis', $this->synopsis);

        return $sth->execute();
    }

    public function update(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `stories` SET 
                        `title` = :title,
                        `author` = :author,
                        `type` = :type,
                        `synopsis` = :synopsis,
                        `updated_at` = NOW()
                WHERE `id_stories` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':author', $this->author);
        $sth->bindValue(':type', $this->type, PDO::PARAM_INT);
        $sth->bindValue(':synopsis', $this->synopsis);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public static function publish(int $id): bool
    {
        $pdo = Database::getInstance();

        $sql = 'UPDATE `stories` SET
            `published_at` = NOW()
            WHERE `id_stories` = :id;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `stories`
                    WHERE `id_stories` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public static function deleteAll(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `sections` WHERE `id_sections` IN (SELECT `id_sections` FROM `chapters_sections`
        JOIN `chapters` ON `chapters`.`id_chapters` = `chapters_sections`.`id_chapters`
        WHERE `id_stories` = :id);';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public static function count(): int
    {
        $sql = 'SELECT COUNT(`id_stories`) as `storiesNb` FROM `stories`';

        $pdo = Database::getInstance();
        $sth = $pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchColumn();
    }
}
