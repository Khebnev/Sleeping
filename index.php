<?php
    session_start();
    if(isset($_SESSION['user'])) {
        header('Location: profile.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/main.css">
</head>
<body>

<!--    Форма авторизации-->

<form  action="vendor/signin.php" method="post">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите свой пароль">
    <button type="submit">Войти</button>
    <p>
        У вас нет аккаунта? <a href="/register.php">Зарегистрируйтесь</a>
    </p>
       <?php
        if(isset($_SESSION['message'])) {
            echo('<p class="msg"> ' . $_SESSION['message'] .' </p>');
            unset($_SESSION['message']);
        }

    ?>
</form>

</body>
</html>
