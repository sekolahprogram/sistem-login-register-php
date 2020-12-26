<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Login Register PHP PDO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
</head>

<body>
    <?php require 'theNavbar.php' ?>

    <div class="columns is-centered">
        <div class="column is-5">
            <div class="card">
                <div class="card-content">
                    <h1 class="title is-4">Login</h1>
                    <?php
                    if (isset($_SESSION['user_login'])) {
                        header('Location:index.php');
                    }

                    if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $sql = "SELECT username, password, role FROM users WHERE username = '$username'";

                        $result = $conn->prepare($sql);
                        $result->execute();
                        $user = $result->fetch(PDO::FETCH_OBJ);

                        if ($user) {
                            if (password_verify($password, $user->password)) {

                                $_SESSION['user_login'] = $user->username;

                                $_SESSION['user_role'] = $user->role;

                                if (isset($_POST['remember'])) {
                                    setcookie('username', $user->username, time() + 3600);
                                }

                                header('Location:index.php');
                            } else {
                                $message = 'password Anda salah';
                            }
                        } else {
                            $message = 'username belum didaftarkan.';
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
                                <input type="text" name="username" id="username" class="input" required>
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <div class="control">
                                <input type="password" name="password" id="password" class="input" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div class="field">
                            <button name="login" class="button is-success is-fullwidth">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require 'theFooter.php' ?>
</body>

</html>