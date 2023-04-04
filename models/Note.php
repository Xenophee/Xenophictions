<?php

class Note
{

    private int $id;
    private int $note;
    private string $noted_at;
    private string $updated_at;
    private string $deleted_at;

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

    public function update(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `notes` SET `note` = :note, `updated_at` = NOW()
                    WHERE `id_notes` = :id;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue('note', $this->note, PDO::PARAM_INT);
        $sth->bindValue(':id_note', $id, PDO::PARAM_INT);

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
