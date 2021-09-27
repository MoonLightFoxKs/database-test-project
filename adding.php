<?php
session_start();
include_once("db.php");
if(isset($_POST['person']) && isset($_POST['password'])){
    $query =mysql_query("SELECT * FROM User WHERE Login='".$_POST['person']."' AND Password='".$_POST['password']."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
	{   
        $row=mysql_fetch_array($query);
		$_SESSION['person']=$_POST['person'];
		$_SESSION['persname']=$row['Name'];
	}
	else {
		echo "Введен неправильный логин или пароль!";
	}
}
include("index.php");
?>