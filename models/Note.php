<?php

class Note
{

    private int $id;
    private int $note;
    private string $noted_at;
    private string $updated_at;
    private string $deleted_at;
    private int $id_users;
    private int $id_stories;

    /**
     * Permet de définir l'id de la note
     * @param int $value
     * 
     * @return void
     */
    public function setId(int $value): void
    {
        $this->id = $value;
    }

    /**
     * Permet de récupérer l'id de la note
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Permet de définir la note
     * @param int $value
     * 
     * @return void
     */
    public function setNote(int $value): void
    {
        $this->note = $value;
    }

    /**
     * Permet de récupérer la note
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * Permet de définir la date d'enregistrement de la note
     * @param string $value
     * 
     * @return void
     */
    public function setNoted_at(string $value): void
    {
        $this->noted_at = $value;
    }

    /**
     * Permet de récupérer la date d'enregistrement de la note
     * @return string
     */
    public function getNoted_at(): string
    {
        return $this->noted_at;
    }

    /**
     * Permet de définir la date de mise à jour de la note
     * @param string $value
     * 
     * @return void
     */
    public function setUpdated_at(string $value): void
    {
        $this->updated_at = $value;
    }

    /**
     * Permet de récupérer la date de mise à jour de la note
     * @return string
     */
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    /**
     * Permet de définir la date de suppression de la note
     * @param string $value
     * 
     * @return void
     */
    public function setDeleted_at(string $value): void
    {
        $this->deleted_at = $value;
    }

    /**
     * Permet de récupérer la date de suppression de la note
     * @return string
     */
    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }

    public function setId_Users(int $value): void
    {
        $this->id_users = $value;
    }

    public function getId_Users(): int
    {
        return $this->id_users;
    }

    public function setId_stories(int $value): void
    {
        $this->id_stories = $value;
    }

    public function getId_stories(): int
    {
        return $this->id_stories;
    }


    public static function getAverageNote($id)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT AVG(`note`) AS `note` FROM `notes`
        WHERE `notes`.`id_stories` = :id';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetch());
        }
    }

    public static function get(int $idUser, int $idStory):object|bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `note` FROM `notes`
        WHERE `notes`.`id_stories` = :id_story AND `notes`.`id_users` = :id_user';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $idUser, PDO::PARAM_INT);
        $sth->bindValue(':id_story', $idStory, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetch());
        }
    }

    public static function isNoteExist(int $idUser, int $idStory): bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `id_notes` FROM `notes` WHERE `id_users` = :id_user AND `id_stories` = :id_story;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $idUser, PDO::PARAM_INT);
        $sth->bindValue(':id_story', $idStory, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return (!empty($result)) ? true : false;
    }

    public function add(): bool
    {
        $pdo = Database::getInstance();

        $sql = 'INSERT INTO `notes` (`note`, `id_users`, `id_stories`) 
                VALUES (:note, :id_users, :id_stories);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':note', $this->note, PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $sth->bindValue(':id_stories', $this->id_stories, PDO::PARAM_INT);

        return $sth->execute();
    }

    public function update(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `notes` SET `note` = :note, `updated_at` = NOW()
                    WHERE `id_users` = :id_user AND `id_stories` = :id_story;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':note', $this->note, PDO::PARAM_INT);
        $sth->bindValue(':id_user', $this->id_users, PDO::PARAM_INT);
        $sth->bindValue(':id_story', $this->id_stories, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `notes`
                    WHERE `id` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    // INSERT INTO `notes` (`id_notes`, `note`, `noted_at`, `updated_at`, `deleted_at`, `id_users`, `id_stories`) VALUES (NULL, '5', CURRENT_TIMESTAMP, NULL, NULL, '1', '1');
}
