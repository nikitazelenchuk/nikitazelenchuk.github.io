<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Таблицы стилей CSS3 - Теория</title>
	<link rel="stylesheet" href="res/css/menu.css">
	<link rel="stylesheet" href="res/css/style.css">
	<link rel="stylesheet" href="res/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        function trySend(){
            var id = $('#id').val();
            var theme = $('#theme').val();
            var text = $('#text').val();
            var check = $('input:radio[name=check]:checked').val();
            if (id=="") {id = -1;}
            if (theme=="") {theme = "\r";}
            if (text=="") {text = "\r";}
            $.ajax({
                type: "POST",
                url: "cgi/script1.py",
                data: {id: id, theme: theme, text: text, check: check}
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

    <!--       Вывод таблицы Информация             -->
    <?php
    	echo "<section><div class='bodyHead'><h2>Таблица Информация</h2></div>";
    	if ($_SESSION != null){
    		if ($_SESSION['user'] == true){
				require_once 'php/connection.php';

				// подключаемся к серверу
				$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка в работе сайта! Зайдите позже!");

				$query ="select * from information;";
		    	$result = mysqli_query($link, $query) or die("Ошибка в работе сайта! Зайдите позже!");
		    	$table = "<table border=1 width = '600px' align=center>";
		    	$table .= "<tr align='center'><td>Id</td><td>Тема или определение</td><td>Содержание</td></tr>";
		    	while($row = mysqli_fetch_array($result)) {
		    		$table .= "<tr>";
                    $table .= "<td>".$row['id']."</td>";
		 			$table .= "<td>".$row['theme']."</td>";
		 			$table .= "<td>".$row['text']."</td>";
		    	}
		    	$table .= "</table>";
		    	echo $table;
    		}else{
    			echo "<div class='descrtiption' style='text-align: center;'><br><h3>Вы не можете просматривать таблицу Информация, так как Вы не зарегистрированы!!!</h3><br></div>";
    		}
    	}else{
    			echo "<div class='descrtiption' style='text-align: center;'><br><h3>Вы не можете просматривать таблицу Информация, так как Вы не зарегистрированы!!!</h3><br></div>";
    	}	
    ?>

    <!--       Редактирование таблицы Информация             -->
        <?php
            if ($_SESSION != null){
                if ($_SESSION['user'] == true){
                    echo "<div style='width: 80%; margin: 0 auto; text-align: center;'>
                        <form>
                            <span class='login-text'>Id: </span>
                            <input type='number' name='id' id='id' min='1'>
                            <span class='login-text'>Определение или тема: </span>
                            <input type='text' name='theme' id='theme'>
                            <span class='login-text'>Содержание: </span>
                            <input type='text' name='text' id='text'><br>
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
                                <li>Для обновления обязательно нужно указать Id и поля, которые нужно обновить</li>
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
