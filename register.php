<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Login Register PHP PDO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
</head>

<body>
    <?php require 'theNavbar.php' ?>

    <div class="columns is-centered">
        <div class="column is-5">
            <div class="card">
                <div class="card-content">
                    <h1 class="title is-4">Register</h1>
                    <?php
                        if (isset($_SESSION['user_login'])) {
                            header('Location:index.php');
                        }

                        if (isset($_POST['register'])) {
                            $username = $_POST['username'];

                            $sql = "SELECT username FROM users WHERE username = '$username'";

                            $result = $conn->prepare($sql);
                            $result->execute();
                            $user = $result->fetch(PDO::FETCH_OBJ);

                            if (!$user) {
                                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                                $sql = "INSERT INTO users(username, password) VALUES('$username', '$password')";

                                $result = $conn->prepare($sql);
                                if ($result->execute()) {
                                    $message = 'Anda berhasil mendaftar akun.';
                                } else {
                                    $message = 'Anda gagal melakukan pendaftaran akun.';
                                }
                            } else {
                                $message = 'Maaf!, username sudah didaftarkan.';
                            }
                        }
                    ?>

                    <?php if (isset($message)) : ?>
                        <div class="notification">
                            <button class="delete"></button>
                            <?= $message; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="field">
                            <label for="username" class="label">Username</label>
                            <div class="control">
                                <input type="text" name="username" id="username" class="input" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" required>
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <div class="control">
                                <input type="password" name="password" id="password" class="input" required>
                            </div>
                        </div>
                        <div class="field">
                            <button name="register" class="button is-success is-fullwidth">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require 'theFooter.php' ?>
</body>

</html>