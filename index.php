<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Login Register PHP PDO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
</head>

<body>
    <?php require 'theNavbar.php' ?>

    <?php
        if (!isset($_SESSION['user_login'])) {
            header('Location:login.php');
        }
    ?>

    <h1 class="title has-text-centered">
        Hai semuanya, dengan saya <?= $_SESSION['user_login']; ?>
    </h1>

    <?php require 'theFooter.php' ?>
</body>

</html>