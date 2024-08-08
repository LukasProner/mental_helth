
<?php 
session_start();
$logged = isset($_SESSION["is_logged"]) ? $_SESSION["is_logged"] : "false";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./query/index-main-query.css">

    <script src="https://kit.fontawesome.com/133aa86f2e.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
if ($logged== "true") {
    require "assets/index_admin_header.php";
    // require "assets/header.php";
    echo "logged";
    echo $logged;
} else {
    require "assets/header.php";
    echo "unlogged";
}
?>
<main>
    <section class="main-heading">
        <h1>Hlavna&nbsp;stranka</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At dignissimos quisquam, reiciendis sapiente magni deserunt ut sint nihil, suscipit officiis dolorem dicta. Quis, quo! Reiciendis numquam velit ad maiores officia?
        Esse et doloremque fugiat assumenda ab iusto! Officiis accusantium ratione odio, accusamus delectus maiores laborum debitis nostrum inventore aut corrupti fugiat! Provident, quidem. Harum repudiandae vitae voluptas fugiat quia maxime.
        Perspiciatis sequi, beatae iste quasi cum itaque libero laudantium ut. Natus, modi? Adipisci saepe ducimus consequatur placeat cum ipsum similique accusantium debitis ullam error labore ea iusto nisi, reprehenderit modi!
        Sed exercitationem inventore dolorem earum consequatur. Quae maxime delectus repellat ea provident porro sit nisi optio inventore. Eum, animi perspiciatis laudantium qui blanditiis culpa, ullam tempore amet dignissimos, magni quia.
        Exercitationem, officiis autem porro similique hic aperiam? Quas, iste ullam. Ducimus debitis rerum labore sed commodi. Labore expedita ipsam dolore, obcaecati odio dolorum possimus, quis incidunt eius reiciendis voluptatum temporibus?
        </p>
    </section>
</main>
    <?php require "assets/footer.php"?> 
    <script src = "./js/header.js"></script>
</body>
</html>