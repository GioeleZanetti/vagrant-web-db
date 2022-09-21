<?php 
class Database {

    static $user = "vagrant";
    static $host = "10.10.20.15";
    static $port = 3306;
    static $password = "vagrant";
    static $dbname = "vagrant";

    static $connection = NULL;

    private function __construct() {}

    public static function getConnection() {
        if (self::$connection != NULL) {
            return self::$connection;
        }

        self::$connection = new mysqli(
            self::$host,
            self::$user,
            self::$password,
            self::$dbname,
            self::$port);

        if (self::$connection->connect_error) {
            die('Connection error: ' . self::$connection->connect_error);
        }
        
        return self::$connection;
    }

}

?>