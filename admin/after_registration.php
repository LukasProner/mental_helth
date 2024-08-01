<?php


require "../assets/url.php";
require "../assets/database.php";
require "../assets/user.php";


session_start();


if($_SERVER["REQUEST_METHOD"] === "POST") {


    $connection = DBconnection();

    $first_name = $_POST["first-name"];
    $second_name = $_POST["second-name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    var_dump($first_name, $second_name, $email, $password);
   
    $id = createUser($connection,$first_name,$second_name,$email,$password);
    if(!empty($id)){
        // Zabraňuje fixation attack.
        session_regenerate_id(true);

        // Nastavenie, že je uživatel prihlaseny
        $_SESSION["is_logged"] = true;
        // Nastavenie id uzivatela
        $_SESSION["user_id"] = $id;

        changeUrl("/mentalHealth/zoznam_testov.php");//zmen potom podla uz uvidim
    } else {
        echo "Uživatele se nepodařilo přidat";
    }

}else {
    echo "Nepovolený pristup";
}

