<?php

class User{

public static function createUser($connection, $first_name, $last_name, $email, $password,$role) {


    $sql = "INSERT INTO user (first_name, last_name, email, password,role)
    VALUES (:first_name, :last_name, :email, :password,:role)";


    // $statement = mysqli_prepare($connection, $sql);
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
    $stmt->bindValue(":last_name", $last_name, PDO::PARAM_STR);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->bindValue(":role", $role, PDO::PARAM_STR);

    try {
        if($stmt->execute()) {
            $id = $connection->lastInsertId();
            return $id;
        } else {
            throw new Exception("Vytvoření uživatele selhalo");
        }
    } catch (Exception $e) {
        error_log("Chyba u funkce createUser\n", 3, "../errors/error.log");
        echo "Typ chyby: " . $e->getMessage();
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
public static function getUserRole($connection, $id){
    $sql = "SELECT role FROM user
            WHERE id = :id";


    $stmt = $connection->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);


    try {
        if($stmt->execute()){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["role"];
        } else {
            throw new Exception("Získání uživatelské role selhalo");
        }
    } catch (Exception $e) {
        error_log("Chyba u funkce getUserRole\n", 3, "../errors/error.log");
        echo "Typ chyby: " . $e->getMessage();
    }      
}

}