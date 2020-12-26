<?php

session_start();

if (isset($_COOKIE['username']) && !isset($_SESSION['user_login'])) {
    $_SESSION['user_login'] = $_COOKIE['username'];
}

?>
<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                Sistem Login Register
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-end">
                <?php if (!isset($_SESSION['user_login'])) : ?>
                    <a class="navbar-item is-tab" href="login.php">Login</a>
                    <a class="navbar-item is-tab" href="register.php">Register</a>
                <?php else : ?>

                    <?php if ($_SESSION['user_role'] == 'admin') : ?>
                        <a class="navbar-item is-tab" href="admin.php">Halaman Admin</a>
                    <?php else : ?>
                        <a class="navbar-item is-tab" href="member.php">Halaman Member</a>
                    <?php endif; ?>

                    <a class="navbar-item is-tab" href="logout.php">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<?php require 'connect.php'; ?>

<section class="section" style="min-height:480px;">
    <div class="container">