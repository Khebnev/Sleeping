<?php
session_start();
//файл отвечает за регистрацию

require_once('connect.php');


$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if($password === $password_confirm) {
    //Продолжаем регистрацию
    //$_FILES['avatar']['name'];
    //Подготовим путь, куда будем загружать нашу картинку
    $path = 'uploads/' . time() .$_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'. $path)) { //Если есть ошибки
        $_SESSION['message'] = 'Ошибка при загрузке сообзения';
        header('Location: ../register.php');
    }
    $password = md5($password);
    mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");
    $_SESSION['message'] = 'Регистрация прошла успешно';
    header('Location: ../index.php');
} else {
        //Если не совпали:
    $_SESSION['message'] = 'Пароли не сопадают';
    header('Location: ../register.php');
}

?>
