<?php

require_once(__DIR__ . '/../helpers/Database.php');

class User
{

    private int $id;
    private string $username;
    private string $email;
    private string $birthdate;
    private string $password;
    private string $registered_at;
    private string $validated_at;
    private string $connected_at;
    private string $updated_at;
    private string $deleted_at;
    private bool $newsletter = false;
    private bool $admin = false;


    // public function __construct(string $username, string $email, string $birthdate, string $password, bool $newsletter)
    // {
    //     $this->username = $username;
    //     $this->email = $email;
    //     $this->birthdate = $birthdate;
    //     $this->password = $password;
    //     $this->newsletter = $newsletter;
    // }

    /**
     * Permet de définir l'id de l'utilisateur
     * @param int $value
     * 
     * @return void
     */
    public function setId(int $value): void
    {
        $this->id = $value;
    }

    /**
     * Permet de récupérer l'id de l'utilisateur
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Permet de définir le nom de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setUsername(string $value): void
    {
        $this->username = $value;
    }

    /**
     * Permet de récupérer le nom de l'utilisateur
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Permet de définir l'email de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setEmail(string $value): void
    {
        $this->email = $value;
    }

    /**
     * Permet de récupérer l'email de l'utilisateur
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Permet de déifinir la date de naissance de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setBirthdate(string $value): void
    {
        $this->birthdate = $value;
    }

    /**
     * Permet de récupérer la date de naissance de l'utilisateur
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * Permet de définir le mot de passe de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setPassword(string $value): void
    {
        $this->password = $value;
    }

    /**
     * Permet de récupérer le mot de passe de l'utilisateur
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Permet de définir la date de création du compte de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setRegistered_at(string $value): void
    {
        $this->registered_at = $value;
    }

    /**
     * Permet de récupérer la date de création du compte de l'utilisateur
     * @return string
     */
    public function getRegistered_at(): string
    {
        return $this->registered_at;
    }

    /**
     * Permet de définir la date de validation lors de la création du compte de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setValidated_at(string $value): void
    {
        $this->validated_at = $value;
    }

    /**
     * Permet de récupérer la date de validation lors de la création du compte de l'utilisateur
     * @return string
     */
    public function getValidated_at(): string
    {
        return $this->validated_at;
    }

    /**
     * Permet de définir la date de la dernière connexion lors de la création du compte de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setConnected_at(string $value): void
    {
        $this->connected_at = $value;
    }

    /**
     * Permet de récupérer la date de la dernière connexion lors de la création du compte de l'utilisateur
     * @return string
     */
    public function getConnected_at(): string
    {
        return $this->connected_at;
    }

    /**
     * Permet de définir la date de la dernière mise à jour du compte de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setUpdated_at(string $value): void
    {
        $this->updated_at = $value;
    }

    /**
     * Permet de récupérer la date de la dernière mise à jour du compte de l'utilisateur
     * @return string
     */
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    /**
     * Permet de définir la date de de suppression du compte de l'utilisateur
     * @param string $value
     * 
     * @return void
     */
    public function setDeleted_at(string $value): void
    {
        $this->deleted_at = $value;
    }

    /**
     * Permet de récupérer la date de de suppression du compte de l'utilisateur
     * @return string
     */
    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }

    /**
     * Permet de définir si l'utilisateur est abonné à la newsletter
     * @param bool $value
     * 
     * @return void
     */
    public function setNewsletter(bool $value): void
    {
        $this->newsletter = $value;
    }

    /**
     * Permet de récupérer si l'utilisateur est abonné à la newsletter
     * @return bool
     */
    public function getNewsletter(): bool
    {
        return $this->newsletter;
    }

    /**
     * Permet de définir si l'utilisateur est administrateur
     * @param bool $value
     * 
     * @return void
     */
    public function setAdmin(bool $value): void
    {
        $this->admin = $value;
    }

    /**
     * Permet de récupérer si l'utilisateur est administrateur
     * @return bool
     */
    public function getAdmin(): bool
    {
        return $this->admin;
    }


    // public static function isDataExist(string $data, string $value): bool|object
    // {
    //     $pdo = Database::getInstance();
    //     $sql = 'SELECT * FROM `users` WHERE :data = :value';
    //     $sth = $pdo->prepare($sql);
    //     $sth->bindValue(':data', $data);
    //     $sth->bindValue(':value', $value);
    //     $sth->execute();

    //     return $sth->fetch();
    // }

    public static function isEmailExist(string $email): bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `id_users` FROM `users` WHERE `email` = ?;';
        $sth = $pdo->prepare($sql);
        $sth->execute([$email]);
        $result = $sth->fetchAll();
        return (!empty($result)) ? true : false;
    }

    public static function isUsernameExist(string $username): bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT `id_users` FROM `users` WHERE `username` = ?;';
        $sth = $pdo->prepare($sql);
        $sth->execute([$username]);
        $result = $sth->fetchAll();

        return (!empty($result)) ? true : false;
    }


    public function add(): bool
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `users` (`username`, `email`, `birthdate`, `password`, `newsletter`) 
                VALUES (:username, :email, :birthdate, :password, :newsletter);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':username', $this->username);
        $sth->bindValue(':email', $this->email);
        $sth->bindValue(':birthdate', $this->birthdate);
        $sth->bindValue(':password', $this->password);
        $sth->bindValue(':newsletter', $this->newsletter, PDO::PARAM_BOOL);
        return $sth->execute();
    }

    public function update(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `users` SET `username` = :username, `email` = :email, `birthdate` = :birthdate, `newsletter` = :newsletter, `updated_at` = NOW()
                    WHERE `id_users` = :id;';
        
        $sth = $pdo->prepare($sql);

        $sth->bindValue(':username', $this->username);
        $sth->bindValue(':email', $this->email);
        $sth->bindValue(':birthdate', $this->birthdate);
        $sth->bindValue(':newsletter', $this->newsletter, PDO::PARAM_INT);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public function updatePassword(int $id): bool
    {
        $pdo = Database::getInstance();

            $sql = 'UPDATE `users` SET `password` = :password, `updated_at` = NOW()
                    WHERE `id_users` = :id;';
        
        $sth = $pdo->prepare($sql);

        $sth->bindValue(':password', $this->password);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getInstance();
        $sql = 'DELETE FROM `users`
                    WHERE `id_users` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public static function get($id): object|bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users`
                    WHERE `id_users` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if ($sth->execute()) {
            return $sth->fetch();
        }
    }

    public static function getByEmail($value): object|bool
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users`
                    WHERE `email` = :value;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':value', $value);

        if ($sth->execute()) {
            return $sth->fetch();
        }
    }

    public static function getAll(string $search = '', int $limit = null, int $offset = 0): array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users`
        WHERE `username` LIKE :search OR `email` LIKE :search
        ORDER BY `username`';

        if (!is_null($limit)) {
            $sql .= ' LIMIT :limit OFFSET :offset';
        }
        $sql .= ';';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':search', '%' . $search . '%');

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

    public static function count(string $search): int
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT COUNT(`id_users`) as `usersNb` FROM `users`
                    WHERE `username` LIKE :search 
                    OR `email` LIKE :search;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':search', '%' . $search . '%');
        $sth->execute();
        return $sth->fetchColumn();
    }

    public static function validateEmail(string $email): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `users` SET `validated_at` = NOW()
        WHERE `email` = :email';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email', $email);

        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }
}
