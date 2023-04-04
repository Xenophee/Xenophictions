<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Chapter
{

    private int $id_chapters;
    private string $title;
    private int $index;
    private string $summary;
    private string $registered_at;
    private string $published_at;
    private string $updated_at;
    private string $deleted_at;
    private int $id_stories;

    /**
     * Permet de définir l'id du chapitre
     * @param int $value
     * 
     * @return void
     */
    public function setId_chapters(int $value): void
    {
        $this->id_chapters = $value;
    }

    /**
     * Permet de récupérer l'id du chapitre
     * @return int
     */
    public function getId_chapters(): int
    {
        return $this->id_chapters;
    }

    /**
     * Permet de définir le titre du chapitre
     * @param string $value
     * 
     * @return void
     */
    public function setTitle(string $value): void
    {
        $this->title = $value;
    }

    /**
     * Permet de récupérer le titre du chapitre
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Permet de définir l'ordre du chapitre
     * @param int $value
     * 
     * @return void
     */
    public function setIndex(int $value): void
    {
        $this->index = $value;
    }

    /**
     * Permet de récupérer l'ordre du chapitre
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * Permet de définir le résumé du chapitre
     * @param string $value
     * 
     * @return void
     */
    public function setSummary(string $value): void
    {
        $this->summary = $value;
    }

    /**
     * Permet de récupérer le résumé du chapitre
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * Permet de définir la date d'enregistrement du chapitre
     * @param string $value
     * 
     * @return void
     */
    public function setRegistered_at(string $value): void
    {
        $this->registered_at = $value;
    }

    /**
     * Permet de récupérer la date d'enregistrement du chapitre
     * @return string
     */
    public function getRegistered_at(): string
    {
        return $this->registered_at;
    }

    /**
     * Permet de définir la date de publication du chapitre
     * @param string $value
     * 
     * @return void
     */
    public function setPublished_at(string $value): void
    {
        $this->published_at = $value;
    }

    /**
     * Permet de récupérer la date de publication du chapitre
     * @return string
     */
    public function getPublished_at(): string
    {
        return $this->published_at;
    }

    /**
     * Permet de définir la date de modification du chapitre
     * @param string $value
     * 
     * @return void
     */
    public function setUpdated_at(string $value): void
    {
        $this->updated_at = $value;
    }

    /**
     * Permet de récupérer la date de modification du chapitre
     * @return string
     */
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    /**
     * Permet de définir la date de suppression du chapitre
     * @param string $value
     * 
     * @return void
     */
    public function setDeleted_at(string $value): void
    {
        $this->deleted_at = $value;
    }

    /**
     * Permet de récupérer la date de suppression du chapitre
     * @return string
     */
    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }

        /**
     * Permet de définir l'id de l'histoire à laquelle le chapitre est rattaché
     * @param int $value
     * 
     * @return void
     */
    public function setId_stories(int $value): void
    {
        $this->id_stories = $value;
    }

    /**
     * Permet de récupérer l'id de l'histoire à laquelle le chapitre est rattaché
     * @return int
     */
    public function getId_stories(): int
    {
        return $this->id_stories;
    }

    public static function getAll(int $id): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT DISTINCT `chapters`.* 
        FROM `chapters`
        LEFT JOIN `chapters_sections` ON `chapters`.`id_chapters` = `chapters_sections`.`id_chapters`
        LEFT JOIN `sections` ON `chapters_sections`.`id_sections` = `sections`.`id_sections`
        WHERE `chapters`.`id_stories` = :id;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }

    public function add(): bool
    {
        $pdo = Database::getInstance();

        $sql = 'INSERT INTO `chapters` (`title`, `index`, `summary`, `id_stories`) 
                VALUES (:title, :index, :summary, :id_stories);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':index', $this->index, PDO::PARAM_INT);
        $sth->bindValue(':summary', $this->summary);
        $sth->bindValue(':id_stories', $this->id_stories, PDO::PARAM_INT);

        return $sth->execute();
    }

    public function update(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `chapters` SET 
                        `title` = :title,
                        `index` = :index,
                        `summary` = :summary,
                        `updated_at` = NOW()
                WHERE `id_chapters` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':index', $this->index, PDO::PARAM_INT);
        $sth->bindValue(':summary', $this->summary);
        $sth->bindValue(':id', $this->id_chapters, PDO::PARAM_INT);
        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
}