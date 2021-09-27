<?php
session_start();
include_once("db.php");
?>
<html>
<head>
<meta charset="UTF-8">
<link href="bootstrap-4.2.1.css" rel="stylesheet" type="text/css">
<style>
 * {
		background-color:white;
	    font-size: 1.1em;
	}
	
	input{
		color: DarkMagenta;
	}
	h1 {
		font-size: 2em;
	}
		h2 {
		font-size: 1.5em;
	}
</style>
<title>Tests</title>
</head>
<body>
<?php
if(($_SESSION['persname'] == "")&&($_SESSION['person'] == "")){
echo '
</br>
<h1 style="color:DarkMagenta; text-align: center;">Тестирование</h1>
<table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="600" class="email-container">
<td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
<form id="form1" name="form1"
method="post" action="adding.php">
<p>Логин</br>
<input type="text" name="person" required class="form-control" placeholder="Введите логин" /></p>
<p>Пароль</br>
<input type="password" name="password" class="form-control" placeholder="Введите пароль" required /></p>
<p><input type="submit" value="Войти" class="button-a button-td" style="background:DarkMagenta; border: 15px solid DarkMagenta;color: #ffffff; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none;border-radius: 3px; font-weight: bold;"/></p>
</form> 
<a href="registr.php"  style="color:DarkMagenta">Зарегистрироваться</a>
</td>
</table>
';}
else {
?>
<table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="700" class="email-container">
<td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">	
<?php	
echo  '<h1 style="color:DarkMagenta; text-align: center;">'.$_SESSION['persname'].', добро пожаловать!'.'</h1>';
echo  '<h2 style="color:DarkMagenta; text-align: center;">Основная теория</h2>';
$query ="SELECT Topic, Description FROM Tests WHERE idTest=(SELECT min(idTest) FROM Tests)";
$res = mysql_query($query);
$row = mysql_fetch_array($res);
echo '<p style="text-align: left">'.$row['Description'].'</p>';
echo '<a href="test.php" style="color:DarkMagenta">'.$row['Topic'].'</a></br>';

echo '</br></br></br><a href="exit.php">'."Завершить прохождение тестирований".'</a></br></td>
</table>';
}

?>
</body>
</html>