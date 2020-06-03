<?php
    $login = $_POST['login'];
    $text = $_POST['text'];
    
    require_once 'connection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка в работе сайта! Зайдите позже!");
    $query ="insert into comments (login, text) values ('$login','$text');";
    $result = mysqli_query($link, $query) or die("Ошибка в работе сайта! Зайдите позже!");
    
    echo '<meta http-equiv="refresh" content="0;URL=../comments.php">';
    
    // закрываем подключение
    mysqli_close($link);
    ?>
