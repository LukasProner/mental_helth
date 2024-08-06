<?php

class User{

public static function createUser($connection, $first_name, $last_name, $email, $password) {


    $sql = "INSERT INTO user (first_name, last_name, email, password)
    VALUES (:first_name, :last_name, :email, :password)";


    // $statement = mysqli_prepare($connection, $sql);
    $stmt = $connection->prepare($sql);


    if ($stmt === false) {
        echo mysqli_error($connection);
    } else {
        // mysqli_stmt_bind_param($statement, "ssss", $first_name, $second_name, $email, $password);
        $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindValue(":last_name", $last_name, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);

        // mysqli_stmt_execute($statement);
        $stmt->execute();
        // $id = mysqli_insert_id($connection);
        $id = $connection->lastInsertId();
        return $id;
    }
}

public static function authentication($connection, $log_email, $log_password) {
    $sql = "SELECT password
                FROM user
                WHERE email = :email";
    
        // $stmt = mysqli_prepare($connection, $sql);
        $stmt = $connection->prepare($sql);

        if($stmt){
            // mysqli_stmt_bind_param($stmt, "s", $log_email);
            $stmt->bindValue(":email", $log_email, PDO::PARAM_STR);

            $stmt->execute();

            if ($user = $stmt->fetch()){
                return password_verify($log_password, $user[0]);
            }   
    } else {
        echo mysqli_error($connection);
    }
}

public static function getUserId($connection,$email){
    $sql = "SELECT id from user where email = :email";

    // $stmt = mysqli_prepare($connection,$sql);
    $stmt = $connection->prepare($sql);
    if($stmt){
        // mysqli_stmt_bind_param($stmt,"s",$email);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        if($stmt->execute()){
            // $result = mysqli_stmt_get_result($stmt);
            // $id_database = mysqli_fetch_row($result); // pole
            // $user_id = $id_database[0];


            $result = $stmt->fetch();
            $user_id = $result[0];
            return $user_id;
        }

    }
}
}