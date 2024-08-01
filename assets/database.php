<?php
    function DBconnection(){
        $db_host = "127.0.0.1";
        $db_user = "Lukas";
        $db_password = "admin123";
        $db_name = "mental helth";
    
    
        $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    
    
        if (mysqli_connect_error()){
            echo mysqli_connect_error();
            exit;
        }
        return $connection;
    }

    
