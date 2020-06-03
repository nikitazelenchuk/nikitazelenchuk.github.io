<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Таблицы стилей CSS3 - CSS-цвета</title>
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
        <div class='colorPhoto'>
            <h1 class="textHead">CSS-цвета</h1>
        </div>
    </section>

    <section>
    	<div class="bodyHead">
    		<h2>CSS-цвета</h2>
    	</div>
    	<div class="descrtiption">
    		<p align="justify">Модуль CSS color подробно описывает значения, которые позволяют авторам определять цвета и непрозрачность html-элементов, а также значения свойства color.</p>
    	</div>
    	<div class="bodyHead">
    		<h2>Свойство color</h2>
    	</div>
    	<div class="descrtiption">
    		<p align="justify">Свойство задаёт цвет шрифта с помощью различных систем цветопередачи. Свойство описывает цвет текстового содержимого элемента. Кроме того, оно используется для предоставления потенциального косвенного значения (currentColor) для любых других свойств, которые принимают значения цвета.

Свойство наследуется.</p>
    	</div>
    	<div class="bodyHead">
    		<h2>Цвета модели RGB</h2>
    	</div>
    	<div class="descrtiption">
    				<p align="justify">Формат значения RGB в шестнадцатеричном формате — это знак #, за которым сразу следуют три или шесть шестнадцатеричных символов. Трехзначная запись RGB #rgb преобразуется в шестизначную форму #rrggbb путем копирования цифр, а не путем добавления нулей. Например, #fb0 расширяется до #ffbb00. Это гарантирует, что белый #ffffff может быть указан в короткой записи #fff, и удаляет любые зависимости от глубины цвета дисплея.</p>

    <p align="justify">Формат значения RGB в функциональной нотации — rgb(, за которым следует разделенный запятыми список из трех числовых значений (либо трех целочисленных значений, либо трех процентных значений), за которыми следует символ ). Целочисленное значение 255 соответствует 100% и F или FF в шестнадцатеричной записи:</p>

    <p>rgb (255,255,255) = rgb (100%, 100%, 100%) = #FFF
<br>Символы пробела допускаются вокруг числовых значений.</p>

    				<p align="justify">Все цвета RGB указываются в цветовом пространстве sRGB. Пользовательские агенты могут различаться в точности, с которой они представляют эти цвета, но использование sRGB дает однозначное и объективно измеримое определение того, каким должен быть цвет.</p>
        <p align="justify">Значения за пределами диапазона устройства должны быть обрезаны или отображены в известном диапазоне: значения красного, зеленого и синего необходимо изменить, чтобы они попадали в диапазон, поддерживаемый устройством. Некоторые устройства, например принтеры, имеют диапазоны, отличные от sRGB, поэтому некоторые цвета за пределами диапазона 0..255 sRGB будут представимы (внутри диапазона устройства) и будут отображаться.</p>
<p>Синтаксис
<br>color: #fb0;
<br>color: #ffbb00;
<br>color: rgb(255,0,0);
<br>color: rgb(100%, 0%, 0%);</p>

    	</div>
    </section>

    <!--       Вывод таблицы основных ключевых слов             -->
    <?php
    	echo "<section><div class='bodyHead'><h2>Основные ключевые слова</h2></div>";
    	if ($_SESSION != null){
    		if ($_SESSION['user'] == true){
				require_once 'php/connection.php';

				// подключаемся к серверу
				$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка в работе сайта! Зайдите позже!");

				$query ="select * from color;";
		    	$result = mysqli_query($link, $query) or die("Ошибка в работе сайта! Зайдите позже!");
		    	$table = "<table border=1 width = '600px' align=center>";
		    	$table .= "<tr align='center'><td>Название</td><td>HEX</td><td>RGB</td></tr>";
		    	while($row = mysqli_fetch_array($result)) {
		    		$table .= "<tr>";
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
    	echo "</section>";
    ?>

	<?php
		require_once 'php/footer.php';
	?>
</body>
</html>
