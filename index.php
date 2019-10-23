<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
	<div class="header-left">
		<div class="align-center">Кря-school</div>
	</div>
	<div class="header">
		<center>header</center>
	</div>
	<div class="left-bar">
		<div class="bar">
			<div class="user">
				<?php 
				session_start();
				if (is_null($_SESSION['email'])){
					echo "<p>Вітаю, госте!</p>";
					echo '<a href="auth.php"><div>Увійти</div></a>';
					echo '<a href="reg.php"><div>Зареєструватися</div></a>';
				}
				else{
					echo "<p>Вітаю, {$_SESSION['email']}!</p>";
					echo '<a href="stop_session.php"><div>Вийти</div></a>';
				}
				?>
				
				
			</div>
		</div>
	</div>
	<div class="content">
		
	</div>
</div>
</body>
</html>