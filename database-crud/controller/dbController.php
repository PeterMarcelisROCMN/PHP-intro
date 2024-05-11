<?php

class DB {
    
    private static $dbConnection; 
    
    // methode om met een Database te connecten
    public static function connectDB() {
        if (self::$dbConnection === null) {
            // Creeer een PDO instantie
            self::$dbConnection = new PDO('mysql:host=localhost;dbname=productendb;charset=utf8', 'root', '');
            self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        return self::$dbConnection;
    }
}