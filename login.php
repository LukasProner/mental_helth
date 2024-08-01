<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/footer.css">

    <script src="https://kit.fontawesome.com/133aa86f2e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "./assets/header.php"; ?>
    <main>
        <section class = "formular">
            <h1>Prihlasenie</h1>
            <form action="./admin/login_check.php" method = "POST">
                <input type="email" name = "login-email"><br>
                <input type="password" name = "password"><br>
                <input type="submit" value = "Log in"><br>
            </form>
        </section>
        <?php require "./assets/footer.php";?>
    </main>
</body>
</html>