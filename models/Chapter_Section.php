<?php

class Chapter_Section {

    private int $id_chapters;
    private int $id_sections;

    public function setId_chapters (int $value):void {
        $this->id_chapters = $value;
    }

    public function getId_chapters ():int {
        return $this->id_chapters;
    }

    public function setId_sections (int $value):void {
        $this->id_sections = $value;
    }

    public function getId_sections ():int {
        return $this->id_sections;
    }

    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `chapters_sections` (`id_chapters`, `id_sections`) 
                VALUES (:id_chapters, :id_sections);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_chapters', $this->id_chapters, PDO::PARAM_INT);
        $sth->bindValue(':id_sections', $this->id_sections, PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `chapters_sections`
                    WHERE `id_sections` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
}