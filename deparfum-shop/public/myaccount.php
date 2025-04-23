<?php
session_start();
$is_logged_in = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/CSS/myaccount.css">
    <title>Мой аккаунт</title>
</head>
<body>
    <div class="overlay-gif">
            <video src="/IMAGES/131976-751915258.mp4" autoplay  muted loop>
    </div>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="php_scripts/registration.php" method="POST">
                <h1>Регистрация</h1>
                    <?php if (isset($_SESSION['registration_errors'])): ?>
                         <div class="error-messages">
                            <?php foreach ($_SESSION['registration_errors'] as $error): ?>
                                <p class="error-text" style="color: red;"><?= htmlspecialchars($error) ?></p>
                            <?php endforeach; ?>
                            <?php unset($_SESSION['registration_errors']);?>
                        </div>
                    <?php endif; ?>
            
                <input type="text" name="userlogin" placeholder="Имя">
                <input type="email" name="usermail" placeholder="Email">
                <input type="password" name="userpassword" placeholder="Пароль">
                <button type="submit">Создать аккаунт</button>            
                <button type="button"><a href="index.php" style="color: #fff; padding: 0px 17px">На главную</a></button> 
            </form>   
        </div>
        <div class="form-container sign-in">
            <form action="php_scripts/login.php" method="POST">
                <h1>Авторизация</h1>

                <?php if (isset($_SESSION['login_errors'])): ?>
                    <div class="error-messages">
                        <?php foreach ($_SESSION['login_errors'] as $error): ?>
                            <p class="error-text" style="color: red;"><?= htmlspecialchars($error) ?></p>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['login_errors']);?>
                    </div>
                <?php endif; ?>
                
                <input type="email" name="usermail" placeholder="Email">
                <input type="password" name="userpassword" placeholder="Пароль">
                <button type="submit" style="padding:10px 70px ;">Войти</button>
                <button type="button"><a href="index.php" style="color: #fff;">На главную</a></button>
            </form>          
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Привет!</h1>
                    <p>Введите свои личные данные, чтобы использовать все возможности сайта</p>
                    <button class="hidden" id="login">Авторизация</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Здравствуй!</h1>
                    <p>Зарегистрируйтесь, указав свои личные данные, чтобы использовать все функции сайта.</p>
                    <button class="hidden" id="register">Регистрация</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/scripts/myaccount.js"></script>
</body>
</html>