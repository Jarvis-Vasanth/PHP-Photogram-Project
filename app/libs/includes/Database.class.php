<?php

class Database 
{
    public static $conn = null;

    public static function getConnection()
    {
        if(Database::$conn == null){
            $servername = "mysql.selfmade.ninja:3306";
            $username = "jarvis";
            $password = "jarvis321Gmail.com";
            $dbname = "jarvis_newdb";
        
            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error); //TOOO; Replace this with exception handle
            } else {
                printf("New connection establish..");
                Database::$conn = $connection;
                return Database::$conn;
            }
        } else {
            printf("Returning existing establishing...");
            return Database::$conn;
        }
    }
}