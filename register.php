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

<!--    Форма Регистрации-->

<form  action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <label>ФИО</label>
    <input type="text"  name="full_name" placeholder="Введите своё полное имя">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Почта</label>
    <input type="email" name="email" placeholder="Введите адрес своей почты">
    <label>Изображение профиля</label>
    <input type="file" name="avatar">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите свой пароль">
    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
    <button type="submit">Войти</button>
    <p>
        У вас уже есть аккаунт? <a href="/">Авторизируйтесь</a>
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
