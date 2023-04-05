<?php

require_once(__DIR__ . '/../helpers/Database.php');

class Comment
{

    private int $id_comments;
    private string $comment;
    private string $sent_at;
    private string $published_at;
    private string $updated_at;
    private string $deleted_at;
    private int $id_users;
    private int $id_stories;

    /**
     * Permet de définir l'id du commentaire
     * @param int $value
     * 
     * @return void
     */
    public function setId_comments(int $value): void
    {
        $this->id_comments  = $value;
    }

    /**
     * Permet de récupérer l'id du commentaire
     * @return int
     */
    public function getId_comments(): int
    {
        return $this->id_comments;
    }

    /**
     * Permet de définir le contenu du commentaire
     * @param int $value
     * 
     * @return void
     */
    public function setComment(string $value): void
    {
        $this->comment = $value;
    }

    /**
     * Permet de récupérer le contenu du commentaire
     * @return int
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Permet de définir la date d'envoi du commentaire
     * @param string $value
     * 
     * @return void
     */
    public function setSent_at(string $value): void
    {
        $this->sent_at = $value;
    }

    /**
     * Permet de récupérer la date d'envoi du commentaire
     * @return string
     */
    public function getSent_at(): string
    {
        return $this->sent_at;
    }

    /**
     * Permet de définir la date de mise à jour du commentaire
     * @param string $value
     * 
     * @return void
     */
    public function setPublished_at(string $value): void
    {
        $this->published_at = $value;
    }

    /**
     * Permet de récupérer la date de mise à jour du commentaire
     * @return string
     */
    public function getPublished_at(): string
    {
        return $this->published_at;
    }

    /**
     * Permet de définir la date de mise à jour du commentaire
     * @param string $value
     * 
     * @return void
     */
    public function setUpdated_at(string $value): void
    {
        $this->updated_at = $value;
    }

    /**
     * Permet de récupérer la date de mise à jour du commentaire
     * @return string
     */
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    /**
     * Permet de définir la date de suppression du commentaire
     * @param string $value
     * 
     * @return void
     */
    public function setDeleted_at(string $value): void
    {
        $this->deleted_at = $value;
    }

    /**
     * Permet de récupérer la date de suppression du commentaire
     * @return string
     */
    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }

    /**
     * Permet de définir l'id de l'utilisateur auquel le commentaire est rattaché
     * @param int $value
     * 
     * @return void
     */
    public function setId_users(int $value): void
    {
        $this->id_users  = $value;
    }

    /**
     * Permet de récupérer l'id de l'utilisateur auquel le commentaire est rattaché
     * @return int
     */
    public function getId_users(): int
    {
        return $this->id_users;
    }
    /**
     * Permet de définir l'id de l'histoire auquel le commentaire est rattaché
     * @param int $value
     * 
     * @return void
     */
    public function setId_stories(int $value): void
    {
        $this->id_stories  = $value;
    }

    /**
     * Permet de récupérer l'id de l'histoire auquel le commentaire est rattaché
     * @return int
     */
    public function getId_stories(): int
    {
        return $this->id_stories;
    }

    public static function getAll(int $id = null): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `comments`.*, `users`.`username` FROM `comments`
        JOIN `users` ON `users`.`id_users` = `comments`.`id_users`';

        if (!is_null($id)) {
            $sql .= 'WHERE `comments`.`id_stories` = :id_stories';
        }

        $sql .= ';';

        $sth = $pdo->prepare($sql);

        if (!is_null($id)) {
            $sth->bindValue(':id_stories', $id, PDO::PARAM_INT);
        }

        if ($sth->execute()) {
            return ($sth->fetchAll());
        }
    }

    public function add(): bool
    {
        $pdo = Database::getInstance();

        $sql = 'INSERT INTO `comments` (`comment`, `id_users`, `id_stories`) 
                VALUES (:comment, :id_users, :id_stories);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':comment', $this->comment);
        $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $sth->bindValue(':id_stories', $this->id_stories, PDO::PARAM_INT);

        return $sth->execute();
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `comments`
                    WHERE `id_users` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public static function publish(int $id): bool
    {
        $pdo = Database::getInstance();

        $sql = 'UPDATE `comments` SET
            `published_at` = NOW()
            WHERE `id_comments` = :id;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        return $sth->execute();
    }
}
