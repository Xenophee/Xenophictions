<?php

class Flash {

    private static function sessionStart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setMessage(string $message) {
        self::sessionStart();
        $_SESSION['message'] = $message;
    }

    public static function getMessage():string {
        self::sessionStart();
        $message = (isset($_SESSION['message'])) ? $_SESSION['message'] : '';
        self::deleteMessage();
        return $message;
    }

    public static function isExist():bool {
        self::sessionStart();
        return isset($_SESSION['message']) ? true : false;
    }

    private static function deleteMessage() {
        unset($_SESSION['message']);
    }
}