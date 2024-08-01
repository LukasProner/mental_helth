<?php


require "../assets/database.php";
require "../assets/url.php";
require "../assets/user.php";


session_start();


if($_SERVER["REQUEST_METHOD"] === "POST") {


    $conn = DBconnection();
    $log_email = $_POST["login-email"];
    $log_password = $_POST["password"];

   var_dump( authentication($conn, $log_email, $log_password));
    if(authentication($conn, $log_email, $log_password)) {
        // Úspěšné přihlášení
    } else {
        // Neúspěšné přihlášení
    }




}
