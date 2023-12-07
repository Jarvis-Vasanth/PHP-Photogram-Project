<?php

class Database 
{
    public static $conn = null;
    public static function getConnection()
    {
        if(Database::$conn == null){
            $servername = get_config('db_server');
            $username = get_config('db_username');
            $password = get_config('db_password');
            $dbname = get_config('db_name');
        
            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error); //TOOO; Replace this with exception handle
            } else {
                // printf("New connection establish..");
                Database::$conn = $connection;
                return Database::$conn;
            }
        } else {
            printf("Returning existing establishing...");
            return Database::$conn;
        }
    }
}