<?php

class Section_Section {

    private int $id_sections_parent;
    private int $id_sections_child;

    public function setId_sections_parent (int $value):void {
        $this->id_sections_parent = $value;
    }

    public function getId_sections_parent ():int {
        return $this->id_sections_parent;
    }

    public function setId_sections_child (int $value):void {
        $this->id_sections_child = $value;
    }

    public function getId_sections_child ():int {
        return $this->id_sections_child;
    }

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