<?php
session_start();
include_once("db.php");
if(isset($_POST['person']) && isset($_POST['password'])){
    $query =mysql_query("SELECT * FROM User WHERE Login='".$_POST['person']."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
	{ 
		echo "Такой логин уже существует!";
		include("registr.php");
	}
	else {
		$_SESSION['persname']=$_POST['persname'];
		$_SESSION['person']=$_POST['person'];
		$query="INSERT INTO `User`(`Name`,`Surname`,`Login`,`Password`) VALUES ('".$_POST['persname']."','".$_POST['surname']."','".$_POST['person']."','".$_POST['password']."')";
		$sql=mysql_query($query);
		include("index.php");
	}
}
?>