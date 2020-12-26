<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Member</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
</head>

<body>
    <?php require 'theNavbar.php' ?>

    <?php
        if (!isset($_SESSION['user_login'])) {
            header('Location:login.php');
        }

        if ($_SESSION['user_role'] != 'member') {
            header('Location:index.php');
        }
    ?>

    <h1 class="title has-text-centered">Halaman member</h1>

    <?php require 'theFooter.php' ?>
</body>

</html>