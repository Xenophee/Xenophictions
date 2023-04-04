<?php

class Character {

    private int $id;
    private string $name;
    private string $role;
    private string $description;

    /**
     * Permet de définir l'id du personnage
     * @param int $value
     * 
     * @return void
     */
    public function setId (int $value):void {
        $this->id = $value;
    }

    /**
     * Permet de récupérer l'id du personnage
     * @return int
     */
    public function getId ():int {
        return $this->id;
    }

    /**
     * Permet de définir le nom du personnage
     * @param string $value
     * 
     * @return void
     */
    public function setName (string $value):void {
        $this->name = $value;
    }

    /**
     * Permet de récupérer le nom du personnage
     * @return string
     */
    public function getName ():string {
        return $this->name;
    }

    /**
     * Permet de définir le role du personnage
     * @param string $value
     * 
     * @return void
     */
    public function setRole (string $value):void {
        $this->role = $value;
    }

    /**
     * Permet de récupérer le role du personnage
     * @return string
     */
    public function getRole ():string {
        return $this->role;
    }

    /**
     * Permet de définir la description du personnage
     * @param string $value
     * 
     * @return void
     */
    public function setDescription (string $value):void {
        $this->description = $value;
    }

    /**
     * Permet de récupérer la description du personnage
     * @return string
     */
    public function getDescription ():string {
        return $this->description;
    }
    
}