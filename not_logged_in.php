<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Prístup zamietnutý</title>
            <link rel="stylesheet" href="../css/general.css">
            <link rel="stylesheet" href="../css/header.css">
            <link rel="stylesheet" href="../query/header-query.css">
            <link rel="stylesheet" href="../css/footer.css">
            <script src="https://kit.fontawesome.com/133aa86f2e.js" crossorigin="anonymous"></script>
            <script>
                // JavaScript na zobrazenie oznámenia a presmerovanie
                window.onload = function() {
                    alert("Musíte byť prihlásený, aby ste mali prístup k tejto stránke.");
                    window.location.href = "../registracia.php";
                };
            </script>
        </head>
        <body>
            <main>
                <section class="main-heading">
                    <h1>Presmerovanie na registráciu</h1>
                    <p>Presmerujeme vás na registračnú stránku...</p>
                </section>
            </main>
        </body>
        </html>
        ';