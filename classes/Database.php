<?php
    class Database{
        public function DBconnection(){
            $db_host = "127.0.0.1";
            $db_user = "Lukas";
            $db_password = "admin123";
            $db_name = "mental helth";
        
        
            // $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
            $connection = "mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8";

        
        
        //     if (mysqli_connect_error()){
        //         echo mysqli_connect_error();
        //         exit;
        //     }
        //     return $connection;
        // }
        try {
            $db = new PDO($connection, $db_user, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}


    
