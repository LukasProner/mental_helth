<?php


// require "../assets/url.php";
// require "../assets/database.php";
require "../classes/Database.php";
require "../classes/Url.php";
require "../classes/User.php";
// require "../assets/user.php";


session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {


    // $connection = DBconnection();
    $database = new Database();
    $connection = $database->DBconnection();


    $first_name = $_POST["first-name"];
    $second_name = $_POST["second-name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = "user";

    var_dump($first_name, $second_name, $email, $password,$role);
   
    $id = User::createUser($connection,$first_name,$second_name,$email,$password,$role);
    if(!empty($id)){
        // Zabraňuje fixation attack.
        session_regenerate_id(true);

        // Nastavenie, že je uživatel prihlaseny
        $_SESSION["is_logged"] = true;
        // Nastavenie id uzivatela
        $_SESSION["user_id"] = $id;
        $_SESSION["role"] = $role;

        Url::changeUrl("/mentalHealth/admin/zoznam_testov.php");//zmen potom podla uz uvidim
    } else {
        echo "Uživatele se nepodařilo přidat";
    }

}else {
    echo "Nepovolený pristup";
}

