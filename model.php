<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
        <?php
        include "inc/connexion.php";
        include "inc/fonction.php";
        if (isset($_GET['p'])) {
            include "page/" . $_GET['p'] . ".php";
        } else {
            include "page/departements.php";
        }
        ?>
    </div>
</body>
</html>