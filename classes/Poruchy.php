<?php

class Poruchy {
    public static function getAllDisorders($connection,$columns = "*"){
        $sql = "SELECT $columns 
                FROM poruchy";

        // $result = mysqli_query($connection, $sql);
        $stmt = $connection->prepare($sql);

        
        try {
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                throw new Exception("Získání dat o vsetkych poruchah zlihalo");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce getAllDisorders, získání dat selhalo\n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }  

    }
    public static function getStudent($connection, $id, $columns = "*") {
        $sql = "SELECT $columns
                FROM poruchy
                WHERE id = :id";
        
        // $stmt = mysqli_prepare($connection, $sql);
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        try {
            if($stmt->execute()) {
                return $stmt->fetch();
            } else {
                throw new Exception("Získání dat o jednom poruche zlihalo");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce getStudent, získání dat selhalo\n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }    
    }
    public static function updateStudent($connection, $nazov,$info,$id){

        $sql = "UPDATE poruchy
                    SET nazov = :nazov,
                        informacie = :informacie
                    WHERE id = :id";
        
        // $stmt = mysqli_prepare($connection, $sql);
        $stmt = $connection->prepare($sql);

        if (!$stmt) {
                echo mysqli_error($connection);
        } else {
            // mysqli_stmt_bind_param($stmt, "ssissi", $first_name, $second_name, $age, $life, $college, $id);
            $stmt->bindValue(":nazov", $nazov, PDO::PARAM_STR);
            $stmt->bindValue(":informacie", $info, PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if($stmt->execute()) {
                return true;
            }
        }
    }
}