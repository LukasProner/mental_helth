<?php
    
    require "../classes/Database.php";
    require "../classes/LoggedControl.php";
    require "../classes/Poruchy.php";
    session_start();
    
    if ( !LoggedControl::isLogged() ){
        die("Nepovolený přístup");
    }
    $database = new Database;
    $connection = $database->DBconnection();

    // $sql = "SELECT * from poruchy ";
    // $result = mysqli_query($connection, $sql);
    // if ($result === false) {
    //     echo mysqli_error($connection);
    // } else {
    //     $zoznam = mysqli_fetch_all($result, MYSQLI_ASSOC);    // premenim na pole a ASSOC zmeni na asociativne pole
    // }
    $zoznam = Poruchy::getAllDisorders($connection, "id, nazov, informacie");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://kit.fontawesome.com/133aa86f2e.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require "../assets/admin_header.php"?> 

    <main>
        <section class="main-heading">
            <h1>Zoznam poruch</h1>
        </section>
        <?php if(empty($zoznam)):?>
            <p> Nikto nebol najdeny </p>
        <?php else :?>
            <ul>
                <?php foreach($zoznam as $porucha):?>
                    <li>
                        <?php echo htmlspecialchars($porucha["nazov"])?>
                    </li>
                    <a href="porucha.php?id=<?= $porucha['id'] ?>">Více informací</a>

                <?php endforeach;?>
            </ul>
        <?php endif;?>
    </main>

    <?php require "../assets/footer.php"?> 
    <script src = "./js/header.js"></script>
</body>
</html>