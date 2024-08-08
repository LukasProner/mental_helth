<?php

    require "../classes/Database.php";
    require "../classes/Poruchy.php";
    require "../classes/LoggedControl.php";

    session_start();

    if ( !LoggedControl::isLogged() ){
        die("Nepovolený přístup");
    }
    $role = $_SESSION["role"];

    $database = new Database;
    $connection = $database->DBconnection();
    if ( isset($_GET["id"]) and is_numeric($_GET["id"]) ) {
        $poruchy = Poruchy::getStudent($connection, $_GET["id"]);
    }
     else {
        $poruchy = null;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Informacie o poruche</h1>
    </header>

    <main>
        <section>
            <?php if ($poruchy === null): ?>
                <p>Porucha</p>
            <?php else: ?>
                <h2><?= $poruchy["nazov"] ?></h2>
                <p>Dodatečné informace: <?= $poruchy["informacie"] ?></p>
                <?php if($role === "admin"): ?>
                    <div class="one-student-buttons">
                        <a class="edit-one-student" href="edit-disorder.php?id=<?= $poruchy['id'] ?>">Editovat</a>
                    </div>
                <?php endif; ?>
            <?php endif ?>    
        </section>
    </main>


    <footer></footer>
</body>
</html>