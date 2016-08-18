<?php

validateUsername();

function validateUsername(){
	$uname=$_GET['uname'];
	require 'sql.php';
	mysql_connect($hostname,$user,$password) or die();
	mysql_select_db($db);
	$data=mysql_query("SELECT * FROM users where username='$uname'");
	if(mysql_num_rows($data)>0)
	{
	print "yes";
	}
	else
	{
	print "no";
	}

}


?>