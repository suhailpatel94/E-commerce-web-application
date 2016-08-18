<?php
session_start();
require 'sql.php';
mysql_connect($hostname,$user,$password) or die('Cant Connect');
mysql_select_db($db) or die('Cant select db');
function check(){
	$username=$_POST['uname'];
	$password=md5($_POST['pass']);
	$query="select * from users where username='$username' and password='$password'";
	$result=mysql_query($query);
	$count=mysql_num_rows($result);
	if($count==1){
		$_SESSION["username"]=$username;
		echo 'Login successful';
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else{
		echo 'Wrong username or password';
		header( "refresh:1; url=home.php" ); 
	}
	
}

if(isset($_POST['submit'])){
	check();
}


?>