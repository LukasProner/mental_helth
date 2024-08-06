<?php


require "../classes/Database.php";
require "../classes/Url.php";
// require "../assets/user.php";
require "../classes/User.php";



session_start();


if($_SERVER["REQUEST_METHOD"] === "POST") {

    $database = new Database;
    $conn = $database->DBconnection();
    $log_email = $_POST["login-email"];
    $log_password = $_POST["password"];

//    var_dump( authentication($conn, $log_email, $log_password));
    if(User::authentication($conn, $log_email, $log_password)) {
        $id = User::getUserId($conn, $log_email);
        session_regenerate_id(true);
        $_SESSION["is_logged"] = true;
        $_SESSION["used_id"] = $id;
        Url::changeUrl("/mentalHealth/admin/zoznam_testov.php");
    } else {
        $error = "Chyba pri prihlaseni";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($error)): ?>
        <p><?= $error ?></p>
        <a href="../login.php">Zpět na přihlášení</a>
    <?php endif; ?>
</body>
</html>
