<?php

    require "assets/database.php";
    $connection = DBconnection();
    if ( isset($_GET["id"]) and is_numeric($_GET["id"]) ) {
        $sql = "SELECT *
                FROM poruchy
                WHERE id = ". $_GET["id"];

        $result = mysqli_query($connection, $sql);
        $poruchy = mysqli_fetch_assoc($result);
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
            <?php endif ?>    
        </section>
    </main>


    <footer></footer>
</body>
</html>