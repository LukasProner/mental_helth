<?php

    // require "../assets/database.php";
    // require "../assets/zak.php";
    // require "../assets/auth.php";
    // require "../assets/url.php";
    require "../classes/Database.php";
    require "../classes/Url.php";
    require "../classes/Poruchy.php";
    require "../classes/LoggedControl.php";
    

    session_start();

    if ( !LoggedControl::isLogged() ){
        die("Nepovolený přístup");
    }

    // $connection = connectionDB();
    $database = new Database();
    $connection = $database->DBconnection();

    if ( isset($_GET["id"]) ){
        $poruchy = Poruchy::getStudent($connection, $_GET["id"]);

        if ($poruchy) {
            $nazov = $poruchy["nazov"];
            $info = $poruchy["informacie"];
            $id = $poruchy["id"];
        } else {
            die("Student nenalezen");
        }

    } else {
        die("ID není zadáno, student nebyl nalezen");
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nazov = $_POST["nazov"];
        $info = $_POST["informacie"];
        

        if(Poruchy::updateStudent($connection, $nazov,$info,$id)){
            // Url::changeUrl("/mentalHelth/admin/porucha.php?id=$id");
            Url::changeUrl("/mentalHealth/admin/zoznam_testov.php");
        };
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://kit.fontawesome.com/0fe3234472.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin_header.php"; ?>
    <form method="POST">
    <input  type="text" 
            name="nazov" 
            placeholder="nazov" 
            value="<?= htmlspecialchars($nazov)  ?>"
            required
    ><br>

    <input  type="text" 
            name="informacie" 
            placeholder="info"
            value="<?= htmlspecialchars($info) ?>" 
            required
    ><br>
    <input type="submit" value="Uložit">
    </form>
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>