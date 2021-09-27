<?php
session_start();
include_once("db.php");
?>
<html>
<head>
<meta charset="UTF-8">
<title>Result</title>
</head>
<body>
<?php
$sql = "UPDATE Testing SET `Finish`='".date("Y-m-d H-i-s")."' WHERE `IdTest`=(SELECT min(IdTest) FROM `Tests`) AND `IdUser`=(SELECT `IdUser` FROM `User` WHERE `Login`='".$_SESSION['person']."')";
$query = mysql_query($sql); 
$query="SELECT min(IdQuestion) FROM `Questions` WHERE IdTest=(SELECT min(IdTest) FROM `Tests`)";
$res=mysql_query($query);
$c = mysql_fetch_assoc($res);
$count1=$c["min(IdQuestion)"];
$query="SELECT max(IdQuestion) FROM `Questions` WHERE IdTest=(SELECT min(IdTest) FROM `Tests`)";
$res = mysql_query($query); 
$c = mysql_fetch_assoc($res);
$count2=$c["max(IdQuestion)"];
$count3=0;
while ($count1<=$count2) {
	$query="SELECT Answer FROM `Answers` WHERE IdQuestion=".$count1." AND Correct=1";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	if ($_POST[$count1]==$row['Answer'] && $row['Answer']!=NULL) 
	$count3++;
	$count1++;
}
$sql="UPDATE Testing SET `Scores`=".$count3." WHERE `IdTest`=(SELECT min(IdTest) FROM `Tests`) AND `IdUser`=(SELECT `IdUser` FROM `User` WHERE `Login`='".$_SESSION['person']."')";
$query=mysql_query($sql);
include("test.php");	
?>
</body>
</html>