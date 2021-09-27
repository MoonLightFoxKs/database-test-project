<?php
session_start();
include_once("db.php");
?>
<html>
<head>
<meta charset="UTF-8">
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
		h3 {
		font-size: 1.5em;
	}
	

</style>
<title>First</title>
</head>
<body>
<?php
$query="SELECT * FROM Testing WHERE IdTest=(SELECT min(IdTest) FROM `Tests`) AND IdUser=(SELECT `IdUser` FROM `User` WHERE `Login`='".$_SESSION['person']."')";
$sql=mysql_query($query);
$numrows=mysql_num_rows($sql);
if ($numrows==0)
{
echo '<h1 style="color:DarkMagenta;">'.$_SESSION['persname'].','." приступаем к выполнению теста!</h1>";
$sql = "INSERT INTO `Testing`(`IdTest`, `IdUser`, `Start` ) VALUES ((SELECT min(IdTest) FROM `Tests`),(SELECT `IdUser` FROM `User` WHERE `Login`='".$_SESSION['person']."'),'".date("Y-m-d H-i-s")."')";
$query = mysql_query($sql);
$query1 ="SELECT idQuestion, Question, Image FROM Questions WHERE idTest=(SELECT min(idTest) FROM Tests)";
$res1 = mysql_query($query1); 
$count=1;
echo '<form method="POST" action="result.php">';
while($row1 = mysql_fetch_array($res1))
{
	echo '<h3>'.$count.". ".$row1['Question'].'</h3>';
	if(!empty($row1['Image']))
	echo '<img src="'.$row1['Image'].'" width="100px">';
	$query2="SELECT Answer FROM Answers WHERE idQuestion='".$row1['idQuestion']."'";
	$res2 = mysql_query($query2); 
	while($row2=mysql_fetch_array($res2))
	{
		echo '<p><input name="'.$row1['idQuestion'].'" type="radio" value="'.$row2['Answer'].'" required >'.$row2['Answer'].'</p>';
	}
	$count++;
}
echo '<input type="submit" value="Показать рeзультаты"class="button-a button-td" style="background:DarkMagenta; border: 15px solid DarkMagenta;color: #ffffff; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none;border-radius: 3px; font-weight: bold;"/></form>';
}
else
{
	?>
	</br>
	<table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="700" class="email-container">
<td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 17px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
	<?php
	$_SESSION['filled1']=1;
	$query="SELECT Scores FROM Testing WHERE IdTest=(SELECT min(IdTest) FROM `Tests`) AND IdUser=(SELECT `IdUser` FROM `User` WHERE `Login`='".$_SESSION['person']."')";
	$scores=mysql_query($query);
	$row = mysql_fetch_array($scores);
	echo '<h1 style="color:DarkMagenta">'.$_SESSION['persname'].','.'</h1><h1>'."Вы набрали ".$row['Scores']." баллa(ов)!</h1>";
	$query="SELECT Start FROM Testing WHERE IdTest=(SELECT min(IdTest) FROM `Tests`) AND IdUser=(SELECT `IdUser` FROM `User` WHERE `Login`='".$_SESSION['person']."')";
	$start=mysql_query($query);
	$row = mysql_fetch_array($start);
	echo "Время начала прохождения тестирования: ".$row['Start']."</br>";
	$query="SELECT Finish FROM Testing WHERE IdTest=(SELECT min(IdTest) FROM `Tests`) AND IdUser=(SELECT `IdUser` FROM `User` WHERE `Login`='".$_SESSION['person']."')";
	$finish=mysql_query($query);
	$row = mysql_fetch_array($finish);
	echo "Время окончания прохождения тестирования: ".$row['Finish']."</br>";
	echo '<a href="index.php">В главное меню</a></td></table>';
}
?>
</body>
</html>