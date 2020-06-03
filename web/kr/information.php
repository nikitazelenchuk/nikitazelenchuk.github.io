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

    </script>
</head>

<body>
	<?php
		require_once 'php/menu.php';
	?>

    <section>
        <div class='informationPhoto'>
            <h1 class="textHead">Теоритические сведения</h1>
        </div>
    </section>

    <section>
    	<div class="bodyHead">
    		<h2>История создания и развития CSS</h2>
    	</div>
    	<div class="descrtiption">
    		<p align="justify">CSS — одна из широкого спектра технологий, одобренных консорциумом W3C и получивших общее название «стандарты Web». В 1990-х годах стала ясна необходимость стандартизировать Web, создать какие-то единые правила, по которым программисты и веб-дизайнеры проектировали бы сайты. Так появились языки HTML 4.01 и XHTML, и стандарт CSS.</p>
            <p align="justify">Термин «каскадные таблицы стилей» был предложен Хоконом Ли в 1994 году. Совместно с Бертом Босом он стал развивать CSS.</p>
            <p align="justify">В отличие от многих существовавших на тот момент языков стиля, CSS использует наследование от родителя к потомку, поэтому разработчик может определить разные стили, основываясь на уже определённых ранее стилях.</p>
            <p align="justify">В середине 1990-х Консорциум Всемирной паутины (W3C) стал проявлять интерес к CSS, и в декабре 1996 года была издана рекомендация CSS1.</p>
    	</div>

    </section>

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
		    	$table .= "<tr align='center'><td>Тема или определение</td><td>Содержание</td></tr>";
		    	while($row = mysqli_fetch_array($result)) {
		    		$table .= "<tr>";
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
    	echo "</section>";
    ?>

	<?php
		require_once 'php/footer.php';
	?>
</body>
</html>
