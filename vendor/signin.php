<?php
    //Файл отвесает за авторизацию
    session_start();

    require_once('connect.php');

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    //Делаем запрос и занесем в переменную
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'"); //Сначала запрос на соединение, а потом выборка из таблицы
     //считаем сколько нашли строк с логином и паролем
    if(mysqli_num_rows($check_user) >0 ) {
        //Авторизировались
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            'id'  => $user['id'],
            'full_name' => $user['full_name'],
            'avatar' => $user['avatar'],
            'email' => $user['email']
        ];
        header('Location: ../profile.php');
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../index.php');
    }
?>

