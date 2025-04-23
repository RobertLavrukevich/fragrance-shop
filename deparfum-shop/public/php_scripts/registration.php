<?php
require_once 'database.php';
session_start();

$errors = []; 


if (isset($_POST['userlogin']) && isset($_POST['usermail']) && isset($_POST['userpassword'])) {
    $userlogin = trim($_POST['userlogin']);
    $usermail = trim($_POST['usermail']);
    $userpassword = trim($_POST['userpassword']);

    if (empty($userlogin) || empty($usermail) || empty($userpassword)) {
        $errors[] = "Все поля должны быть заполнены!";
    } else {
        $query = "SELECT * FROM users WHERE userlogin = '$userlogin' OR usermail = '$usermail'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Такой аккаунт уже существует!";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (userlogin, usermail, userpassword) VALUES ('$userlogin', '$usermail', '$hashedPassword')";
            $result = mysqli_query($connect, $query);

            if ($result) {
                $user_id = mysqli_insert_id($connect); 
                $_SESSION['user'] = [
                    'id' => $user_id,
                    'login' => $userlogin,
                    'email' => $usermail
                ];
                header("Location: ../profile.php");
                exit();
            } else {
                $errors[] = "Не удалось создать аккаунт. Попробуйте позже.";
            }
        }
    }
} else {
    $errors[] = "Ошибка: данные из формы не были отправлены.";
}

$_SESSION['registration_errors'] = $errors;
header("Location: ../myaccount.php");
exit();
?>
