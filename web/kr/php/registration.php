<?php
    
    $login = $_POST['Login'];
    $pass = md5($_POST['Password']);
    $confpass = md5($_POST['ConfPassword']);
    
    if (strcmp($pass, $confpass) == 0){
        require_once 'connection.php';
        
        // подключаемся к серверу
        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка в работе сайта! Зайдите позже!");
        $id = -1;
        $query ="select id from users where login='$login';";
        $result = mysqli_query($link, $query) or die("Ошибка в работе сайта! Зайдите позже!");
        $userinfo = mysqli_fetch_array($result);
        
        if($result)
        {
            if ($userinfo[0] != null){
                echo "Логин уже занят!";
            }else{
                $query ="insert into users(login, pass, type) values('".$login."','".$pass."', '0');";
                $result = mysqli_query($link, $query) or die("Ошибка в работе сайта! Зайдите позже!");
                if ($result) echo '<meta http-equiv="refresh" content="0;URL=index.php">';
            }
        }else{
            echo "Ошибка в работе сайта! Зайдите позже!";
        }
        
        // закрываем подключение
        mysqli_close($link);
    }else{
        echo "Пароли не совпадают!";
    }
    ?>
