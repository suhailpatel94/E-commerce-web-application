<?php
$hostname="sql110.byethost7.com";
$user="b7_16775419";
$password="abcdef";

$conn=mysql_connect($hostname,$username,$password) or die("Unable to connect to mysql");


$selected= mysql_select_db("b7_16775419_product",$conn) or die("could not select register"); 

?>