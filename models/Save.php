<?php

require_once(__DIR__ . '/../helpers/Database.php');


class Save {

    private int $id_saves;
    private int $id_users;
    private int $id_sections;
    private string $read_at;

    public function setId_saves (int $value):void {
        $this->id_saves = $value;
    }

    public function getId_saves ():int {
        return $this->id_saves;
    }

    public function setId_users (int $value):void {
        $this->id_users = $value;
    }

    public function getId_users ():int {
        return $this->id_users;
    }

    public function setId_sections (int $value):void {
        $this->id_sections = $value;
    }

    public function getId_sections ():int {
        return $this->id_sections;
    }

    public function setRead_at (string $value):void {
        $this->read_at = $value;
    }

    public function getRead_at ():string {
        return $this->read_at;
    }

    public static function get(int $id)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT *
        FROM `sections_sections`
        WHERE `id_sections_child` = :id';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        }
    }

    public static function getAll(int $idUser, int $idChapter): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `sections`.`id_sections`, `sections`.`title` AS `section_title`
        FROM `sections`
        JOIN `saves` ON `sections`.`id_sections` = `saves`.`id_sections`
        JOIN `chapters_sections` ON `sections`.`id_sections` = `chapters_sections`.`id_sections`
        JOIN `chapters` ON `chapters_sections`.`id_chapters` = `chapters`.`id_chapters`
        JOIN stories ON `stories`.`id_stories` = `chapters`.`id_stories`
        WHERE `saves`.`id_users` = :id_users AND `chapters`.`id_chapters` = :id_chapters
        ORDER BY `saves`.`read_at`;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_users', $idUser, PDO::PARAM_INT);
        $sth->bindValue(':id_chapters', $idChapter, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->fetchAll());
        } else {
            return [];
        }
    }

    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `saves` (`id_users`, `id_sections`) 
                VALUES (:id_users, :id_sections);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $sth->bindValue(':id_sections', $this->id_sections, PDO::PARAM_INT);
        return $sth->execute();
    }

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