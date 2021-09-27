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
<title>Registration</title>
</head>
<body>
</br>
<h1 style="color:DarkMagenta; text-align: center;">Регистрация</h1>
<table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="600" class="email-container">
<td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
<form id="form1" name="form1" method="post" action="registr2.php">
<p>Имя</br>
<input type="text" name="persname" class="form-control" placeholder="Введите имя" required /></p>
<p>Фамилия</br>
<input type="text" name="surname" class="form-control" placeholder="Введите фамилию" required /></p>
<p>Логин</br>
<input type="text" name="person" class="form-control" placeholder="Введите логин" required /></p>
<p>Пароль</br>
<input type="password" name="password" class="form-control" placeholder="Введите пароль" required /></p>
<p><input type="submit" value="Зарегистрироваться" class="button-a button-td" style="background:DarkMagenta; border: 15px solid DarkMagenta;color: #ffffff; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none;border-radius: 3px; font-weight: bold;" /></p>
</form>
</td>
</table>
</body>
</html>