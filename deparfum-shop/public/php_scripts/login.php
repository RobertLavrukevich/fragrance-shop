<?php
require_once 'database.php';
session_start();

$errors = []; 



if (isset($_POST['usermail']) && isset($_POST['userpassword'])) {
    $usermail = trim($_POST['usermail']);
    $userpassword = trim($_POST['userpassword']);

    if (empty($usermail) || empty($userpassword)) {
        $errors[] = "Все поля должны быть заполнены!";
    } else {
        $query = "SELECT * FROM users WHERE usermail = '$usermail'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($hashedPassword, $user['userpassword'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'login' => $user['userlogin'],
                    'email' => $user['usermail']
                ];
                header("Location: ../profile.php");
                exit();
            } else {
                $errors[] = "Неверный пароль!";
            }
        } else {
            $errors[] = "Пользователь с таким email не найден!";
        }
    }
} else {
    $errors[] = "Ошибка: данные из формы не были отправлены.";
}

$_SESSION['login_errors'] = $errors;
header("Location: ../myaccount.php");
exit();
?>
