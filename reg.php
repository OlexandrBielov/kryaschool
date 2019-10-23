<?php 
ini_set('error_reporteng', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		tr input:invalid + span::after {
			content: 'x';
			color: red;
			position: absolute;
		}
	</style>
	<meta charset="utf-8">
</head>
<body>
<?php 
mb_internal_encoding("UTF-8");
if ($_POST != array()){
	$link = mysqli_connect('localhost', 'dlit', 'dlit') or die('Не удалось соединиться: ' . mysqli_error());
	mysqli_select_db($link, 'Krya') or die('Не удалось выбрать базу данных');
	$first_name=mb_convert_encoding($_POST['first_name'], "UTF-8");
	$query = "INSERT INTO user (`email`, `first_name`, `last_name`, `password`) VALUES ('{$_POST['email']}1', '{$first_name}', '{$_POST['last_name']}', '{$_POST['pass']}')";
	//$first_name_utf8 = utf8_encode($_POST['first_name']) ;
	//$query = "INSERT INTO user (`email`, `first_name`, `last_name`, `password`) VALUES ('" . $_POST['email'] . "','" . $first_name_utf8 . "','" . $_POST['last_name'] . "','" . $_POST['pass'] . "')";
	echo $query;
	$result = mysqli_query($link, "SET CHARACTER SET utf8");
	$result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysqli_error($link));
	//header("Location: auth.php");
	
	die();
}
?>

<form action="reg.php" method="post">
	<table>
		<tr>
			<td><label for="name">Имя</label></td>
			<td><input type="text" name="first_name" id="first_name" required pattern="[А-Я][а-я]+" placeholder="Василий"><span></span></td>
		</tr>
		<tr>
			<td><label for="last_name">Фамилия</label></td>
			<td><input type="text" name="last_name" id="last_name" required pattern="[А-Я][а-я]+" placeholder="Васильев"><span></span></td>
		</tr>
		<tr>
			<td><label for="Email">Эл. почта</label></td>
			<td><input type="Email" name="email" id="email" required placeholder="example@post.com"><span></span></td>
		</tr>
		<tr>
			<td><label for="Password">Пароль</label></td>
			<td><input type="password" name="pass" id="pass" required placeholder="от 4 до 10 символов" minlength="4" maxlength="10"><span></span></td>
		</tr>
	</table>
    <input type="submit" >
</form>
</body>
</html>