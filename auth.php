<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
	<title>Authorization</title>
	<style type="text/css">
		input:invalid + span::after {
			content: 'x';
			color: red;
			position: absolute;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="style_auth.css">
</head>
<body>
<?php 
if($_POST != array()){
	//echo $_POST['email'];
	if ($_POST != array()){
		$link = mysqli_connect('localhost', 'dlit', 'dlit') or die('Не удалось соединиться: ' . mysqli_error());
		mysqli_select_db($link, 'Krya') or die('Не удалось выбрать базу данных');
		$first_name=mb_convert_encoding($_POST['first_name'], "UTF-8");
		$query = "SELECT * FROM user WHERE email='{$_POST['email']}'";
		$result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysqli_error($link));
		$row = mysqli_fetch_array($result);
		session_start();
		$_SESSION['id'] = $row['id'];

		$_SESSION['email'] = $row['email'];
		header("Location: index.php");
		
	} 
	die();
}
?>
<div class="wrapper">
	<form action="auth.php" method="POST">
	<table>
		<tr>
			<td><label for="Email">Эл. почта</label></td>
			<td><input type="Email" name="email" id="email" required placeholder="example@post.com"><span></span></td>
		</tr>
		<tr>
			<td><label for="Password">Пароль</label></td>
			<td><input type="password" name="pass" id="pass" required placeholder="от 4 до 10 символов" minlength="4" maxlength="10"><span></span></td>
		</tr>
	</table>
    <input type="submit" text="Отправить">
</form>
</div>
</body>
</html>