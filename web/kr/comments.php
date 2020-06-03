<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Таблицы стилей CSS3 - Благодарности</title>
	<link rel="stylesheet" href="res/css/menu.css">
	<link rel="stylesheet" href="res/css/style.css">
	<link rel="stylesheet" href="res/css/login.css">
	<script type="text/javascript">
		
	</script>
</head>

<body>
	<?php
		require_once 'php/menu.php';
	?>

	<section>
        <div class='commentPhoto'>
            <h1 class="textHead">Благодарности ☺️</h1>
        </div>
    </section>

    <section>
    	<div class='bodyHead'><h2>Комментарии</h2></div>
    	<?php
    		require_once 'php/connection.php';
			$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка в работе сайта! Зайдите позже!");
			$query ="select login, text from comments;";
    		$result = mysqli_query($link, $query) or die("Ошибка в работе сайта! Зайдите позже!");
    		if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<div style='width: 67%; margin: 0 auto; padding: 15px; border-radius: 5px;border: 1px solid #6f6f6f;'><b>".$row["login"]."</b><br>". $row["text"]. "</div><br>";
			    }
			} else {
			    echo "<div style='width: 70%; margin: 0 auto; text-align: center;'><h2>0 комментариев! Будьте первым!</h2>";
			}
			mysqli_close($link);
    	?>
    </section>

    <section>
    	<div class="commentForm">
	    	<h2>Напишите комментарий</h2>
			<form action="php/comment.php" method="post">
				<span class="login-text">Логин:<br></span>
				<?php
					if ($_SESSION != null){
    					if ($_SESSION['user'] == true){
    						echo "<input type='text' name='login' class='login' value='".$_SESSION['login']."' required><br>";
    					}
    				}else{
    					echo "<input type='text' name='login' class='login' required><br>";
    				}
				?>			
				<span class="login-text" style="width: 100%;">Текст:<br></span>
				<textarea name="text" rows="10" id="text" style="width: 100%; box-sizing: border-box;border-radius: 5px;border: 1px solid #000;" required></textarea>
				<div class="button">
					<input type="submit" class="button">
					<input type="reset" class="button">
				</div>
			</form>
		</div>
    </section>

	<?php
		require_once 'php/footer.php';
	?>
</body>
</html>
