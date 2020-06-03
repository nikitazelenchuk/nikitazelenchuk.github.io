<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Вход</title>
	<link rel="stylesheet" href="res/css/menu.css">
	<link rel="stylesheet" href="res/css/login.css">
	<link rel="stylesheet" href="res/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    	function tryLogin(){
    		var log = $('#login').val();
    		var pass = $('#pass').val();
    		$.ajax({
          		type: "POST",
          		url: "php/login.php",
          		data: {Login: log, Password: pass}
        	}).done(function(result){
              	$("#exceptionPas").html(result);
        	});
        	
        }
        function refreshExceptionsDiv(){
        	$("#exceptionLog").html("");
            $("#exceptionPas").html("");
        }
    </script>
</head>

<body style="background: url(res/img/back.png);">
	<?php
		require_once 'php/menu.php';
	?>
	<p></p>
	<div class="container">
		<div class="form-container">
		<form>
			<div class="login-head">Вход</div>
			<span class="login-text">Логин:<br></span>
			<input type="text" id="login" class="login">
			<div id="exceptionLog"></div><br>
			<span class="login-text">Пароль:<br></span>
			<input type="password" id="pass" class="login"><br>
			<div id="exceptionPas"></div><br>
			<div class="button">
				<input type="button" value="Отправить" onclick="tryLogin();" class="button">
				<input type="reset" onclick="refreshExceptionsDiv()" class="button">
			</div>
		</form>
		</div>
	</div>


	<div class="footer-container">
		<?php
			require_once 'php/footer.php';
		?>
	</div>

</body>
</html>