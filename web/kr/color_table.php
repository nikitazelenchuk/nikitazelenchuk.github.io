<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Таблицы стилей CSS3 - Таблица основных ключевых слов</title>
<link rel="stylesheet" href="res/css/menu.css">
<link rel="stylesheet" href="res/css/style.css">
<link rel="stylesheet" href="res/css/index.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function trySend(){
    var id = $('#id').val();
    var name = $('#name').val();
    var hex = $('#hex').val();
    var rgb = $('#rgb').val();
    var check = $('input:radio[name=check]:checked').val();
    if (id=="") {id = -1;}
    if (name=="") {name = "\r";}
    if (hex=="") {hex = "\r";}
    if (rgb=="") {rgb = "\r";}
    $.ajax({
           type: "POST",
           url: "cgi/script.py",
           data: {id: id, name: name, hex: hex, rgb: rgb, check: check}
           }).done(function(result){
                   $("#exception").html(result);
                   });     
}
function refreshExceptionsDiv(){
    $("#exception").html("");
}
</script>
</head>

<body>
<?php
    require_once 'php/menu.php';
    ?>

<!--       Вывод таблицы основных ключевых слов             -->
<?php
    echo "<section><div class='bodyHead'><h2>Таблица основных ключевых слов</h2></div>";
    if ($_SESSION != null){
        if ($_SESSION['user'] == true){
            require_once 'php/connection.php';
            
            // подключаемся к серверу
            $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка в работе сайта! Зайдите позже!");
            
            $query ="select * from color;";
            $result = mysqli_query($link, $query) or die("Ошибка в работе сайта! Зайдите позже!");
            $table = "<table border=1 width = '600px' align=center>";
            $table .= "<tr align='center'><td>Id</td><td>Название</td><td>HEX</td><td>RGB</td></tr>";
            while($row = mysqli_fetch_array($result)) {
                $table .= "<tr>";
                $table .= "<td>".$row['id']."</td>";
                $table .= "<td>".$row['name']."</td>";
                $table .= "<td>".$row['hex']."</td>";
                $table .= "<td>".$row['rgb']."</td>";
            }
            $table .= "</table>";
            echo $table;
        }else{
            echo "<div class='descrtiption' style='text-align: center;'><br><h3>Вы не можете просматривать таблицу основных ключевых слов, так как Вы не зарегистрированы!!!</h3><br></div>";
        }
    }else{
        echo "<div class='descrtiption' style='text-align: center;'><br><h3>Вы не можете просматривать таблицу основных ключевых слов, так как Вы не зарегистрированы!!!</h3><br></div>";
    }	
    ?>

<!--       Редактирование таблицы основных ключевых слов            -->
<?php
    if ($_SESSION != null){
        if ($_SESSION['user'] == true){
            echo "<div style='width: 100%; margin: 0 auto; text-align: center;'>
            <form>
            <span class='login-text'>Id: </span>
            <input type='number' name='id' id='id' min='1'>
            <span class='login-text'>Название цвета: </span>
            <input type='text' name='name' id='name'>
            <span class='login-text'>HEX: </span>
            <input type='text' name='hex' id='hex'>
            <span class='login-text'>RGB: </span>
            <input type='text' name='rgb' id='rgb'><br>
            <input type='radio' name='check' value='1'>delete
            <input type='radio' name='check' value='2'>add
            <input type='radio' name='check' value='3'>update
            <input type='button' value='Отправить' onclick='trySend();'>
            <div id='exception'></div>
            </form></div>";
            echo "
            <div style='width: 80%; margin: 0 auto;'><br>
            <ul>
            <li>Для удаления данных достаточно указать только Id</li>
            <li>Для добавления данных нужно указать все данные</li>
            <li>Для обновления обязательно нужно указать Id и поля, которые необходимо обновить</li>
            </ul>
            </div>
            ";
        }
    }
    echo "</section>";
    ?>
<?php
    require_once 'php/footer.php';
    ?>
</body>
</html>
