<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/registracia.css">


    <script src="https://kit.fontawesome.com/133aa86f2e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php"; ?>


    <main>
    <section class="registration-form">
        <h1>Registračný formulár</h1>
        <form action="admin/after-registration.php" method="POST">
            <input class = "registration-info" type="text" name="first-name" placeholder="Křestní jméno"><br>
            <input class = "registration-info" type="text" name="second-name" placeholder="Příjmení"><br>
            <input class = "registration-info" type="email" name="email" placeholder="Email"><br>
            <input class = "registration-info password-first" type="password" name="password" placeholder="Heslo"><br>
            <input class = "registration-info password-second" type="password" name="password-again" placeholder="Heslo znovu"><br><br>
            <p class="result-text"></p>
            <input class = "submit" type="submit" value="Zaregistrovat">
        </form>
    </section>
    </main>


    <?php require "assets/footer.php"; ?>
    <script src="./js/header.js"></script>
    <script src="./js/check_password.js"></script>
</body>
</html>
