<?php

class Poruchy {
    public static function getAllDisorders($connection,$columns = "*"){
        $sql = "SELECT $columns 
                FROM poruchy";

        // $result = mysqli_query($connection, $sql);
        $stmt = $connection->prepare($sql);

        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // if ($result === false) {
        //     echo mysqli_error($connection);
        // } else {
        //     $allStudents = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //     return $allStudents;    
        // }
    }
    public static function getStudent($connection, $id, $columns = "*") {
        $sql = "SELECT $columns
                FROM poruchy
                WHERE id = :id";
        
        // $stmt = mysqli_prepare($connection, $sql);
        $stmt = $connection->prepare($sql);

        if ($stmt === false) {
            echo mysqli_error($connection);
        } else {
            // mysqli_stmt_bind_param($stmt, "i", $id);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if($stmt->execute()) {
                return $stmt->fetch();
            }
        }
    }


}