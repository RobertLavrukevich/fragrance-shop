<?php
require_once 'database.php';
session_start();

$errors = [];

if (isset($_POST['userlogin']) && isset($_POST['usermail']) && isset($_POST['userpassword'])) 
{
    $userlogin = trim($_POST['userlogin']);
    $usermail = trim($_POST['usermail']);
    $userpassword = trim($_POST['userpassword']);

    if (empty($userlogin) || empty($usermail) || empty($userpassword)) 
    {
        $errors[] = "Все поля должны быть заполнены!";
        //echo "Ошибка: все поля должны быть заполнены!";
        //exit();
    }

    $query = "SELECT * FROM users WHERE userlogin = '$userlogin' OR usermail = '$usermail'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) 
    {
        //echo "Ошибка: такой аккаунт уже существует!";
        $errors[] = "Такой аккаунт уже существует!";

    } 

    else 
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (userlogin, usermail, userpassword) VALUES ('$userlogin', '$usermail', '$hashedPassword')"; 
        $result = mysqli_query($connect, $query);

        if ($result) 
        {
            $user_id = mysqli_insert_id($connect); 
            $_SESSION['user'] = [
                'id' => $user_id,
                'login' => $userlogin,
                'email' => $usermail
            ];
            header("Location: ../profile.php"); 
            exit();
        } 
        
        else 
        {
            $errors[] = "Не удалось создать аккаунт. Попробуйте позже.";
        }
    }
} 

else 
{
    $errors[] = "Ошибка: данные не были отправлены.";
}

$_SESSION['registration_errors'] = $errors;
header("Location: ../myaccount.php");
exit();
?>



<?php
require_once 'database.php';
session_start();

$errors = [];

if (isset($_POST['usermail']) && isset($_POST['userpassword'])) 
{
    $usermail = trim($_POST['usermail']);
    $userpassword = trim($_POST['userpassword']);

    if (empty($usermail) || empty($userpassword)) 
    {
        $errors[] = "Все поля должны быть заполнены!";
        //echo "Ошибка: все поля должны быть заполнены!";
        //exit();
    }

    $query = "SELECT * FROM users WHERE usermail = '$usermail'"; 
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) 
    {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($userpassword, $user['userpassword'])) 
        {
            
        $_SESSION['user'] = [
            'id' => $user['id'],
            'login' => $user['userlogin'],
            'email' => $user['usermail']
        ];
        header("Location: ../profile.php");
        exit();
        } 

        else 
        {
        $errors[] = "Неверный пароль!";
        //echo "Ошибка: неверный пароль!";
        }
    } 

    else 
    {
    $errors[] = "Пользователь с таким email не найден!";
    //echo "Ошибка: пользователь с таким email не найден!";
    }
} 

else 
{
    $errors[] = "Ошибка: данные из формы не были отправлены.";
//echo "Ошибка: данные из формы авторизации не были отправлены.";
} 

$_SESSION['login_errors'] = $errors;
header("Location: ../myaccount.php");
exit();
?>
/////////////////////////////////////////////////////
<?php
require_once 'database.php';
session_start();

$errors = []; // Массив для хранения ошибок
$_SESSION['active_form'] = 'registration'; 


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
                $_SESSION['active_form'] = null;/////
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

// Передаем ошибки обратно на форму
$_SESSION['registration_errors'] = $errors;
header("Location: ../myaccount.php");
exit();
?>


<?php
require_once 'database.php';
session_start();

$errors = []; // Массив для хранения ошибок
$_SESSION['active_form'] = 'login'; // Устанавливаем активную форму



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

            if (password_verify($userpassword, $user['userpassword'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'login' => $user['userlogin'],
                    'email' => $user['usermail']
                ];

                $_SESSION['active_form'] = null; // Сбрасываем активную форму
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

// Передаем ошибки обратно на форму
$_SESSION['login_errors'] = $errors;
header("Location: ../myaccount.php");
exit();
?>
            <script src="/scripts/checkboxsave.js "></script>













const basketOpen = document.getElementById('basket-open');
const basketClose = document.getElementById('basket-close');
const basket = document.querySelector('.basket');
const body = document.querySelector('body');

basketOpen.addEventListener('click', () =>{
    basket.style.right = '0px';
    body.style.position = 'fixed';
    body.style.overflowY = 'scroll';
});

basketClose.addEventListener('click', () => {
    basket.style.right = '-400px';
    body.style.position = 'absolute';
});



<div class="basket" id="basket-container">    
      <button class="basket-btn-close" id="basket-close"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
      </svg></button>     
           <div class="pagetoaccount">
              <h3>ВАША КОРЗИНА ПУСТА...</h3>
              <h5><a href="myaccount.php">войти</a> / <a href="myaccount.php">зарегистрироваться</a></h5>
              <div class="tocatalog"><a href="catalog.php">ПЕРЕЙТИ К КАТАЛОГУ ПРОДУКТОВ</a></div>
           </div>
    </div>