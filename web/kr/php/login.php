<?php
    
    $login = $_POST['Login'];
    $pass = md5($_POST['Password']);
    
    require_once 'connection.php';
    
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка в работе сайта! Зайдите позже!");
    
    $query ="select id, type, pass from users where login='$login' and pass='$pass';";
    $result = mysqli_query($link, $query) or die("Ошибка в работе сайта! Зайдите позже!");
    $userinfo = mysqli_fetch_array($result);
    if($result)
    {
        if($userinfo != 0){
            session_start();
            $_SESSION['user'] = true;
            $_SESSION['login'] = $login;
            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        }else{
            echo "Логин или пароль введены неверно!";
        }
    }else{
        echo "Ошибка в работе сайта! Зайдите позже!";
    }
    
    // закрываем подключение
    mysqli_close($link);
    ?>
