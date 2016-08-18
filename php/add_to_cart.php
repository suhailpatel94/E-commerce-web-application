<?php
	session_start();
	
	if(isset($_SESSION['username']))
	{
		$cart_id=$_GET['sid'];
	}
	
	if(!isset($_POST['update']) and !isset($cart_id)){
	$id=$_POST['id'];
	$product_no=$_POST['no_of_product'];
	$price=$_POST['price'];
	$pr_name=$_POST['product_name'];
	$total=$product_no * $price;
	}
	
	function check(){
		if(isset($_SESSION['username'])){
			add();
		}
		else{
			
			//header('Location:home.php');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
	
	function add(){
		$id=$_POST['id'];
		$img=$_POST['img'];
		$product_no=$_POST['no_of_product'];
		$price=$_POST['price'];
		$pr_name=$_POST['product_name'];
		require 'sql.php';
		mysql_connect($hostname,$user,$password) or die('Cant Connect');
		mysql_select_db($db) or die('Cant select db');
		
		
		//check if product already exist in cart
		if(productexist()){
			$row=mysql_query("select quantity,total from cart where username='".$_SESSION['username']."' and product= '".$GLOBALS['pr_name']."'");
				while($data=mysql_fetch_array($row)){
					$updatedcount=$data['quantity']+$GLOBALS['product_no'];
					$updatedtotal=$data['total'] + $GLOBALS['total'];
					$update_query="update cart set quantity='$updatedcount',total='$updatedtotal' where username='".$_SESSION['username']."' and product= '".$GLOBALS['pr_name']."'";
					mysql_query($update_query);
					$updatedcount=0;
					$updatedtotal=0;
						header('Location: ' . $_SERVER['HTTP_REFERER']);
						// header( "refresh:5; url=" . $_SERVER['HTTP_REFERER']); 
					echo 'updated';
				}
			
		}
		else{
			mysql_query("insert into cart values(NULL,'".$_SESSION['username']."','$img','$pr_name','$price','$product_no','".$GLOBALS['total']."')");
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			echo 'Added to cart';
		}
		header('refresh:1,url=' . $_SERVER['HTTP_REFERER']);
	}
	
	function productexist(){
		$check_query="select username,product from cart where username='".$_SESSION['username']."' and product= '".$GLOBALS['pr_name']."'";	
		$row=mysql_query($check_query);
		if(mysql_num_rows($row)!=0){
			return true;
		}
		else{
			return false;
		}
	}
	
	
	function update(){
		require 'sql.php';
		mysql_connect($hostname,$user,$password) or die('Cant Connect');
		mysql_select_db($db) or die('Cant select db');
		$pr_qun_arr=$_POST['product_quantity'];
		$pr_name_arr=$_POST['product_name'];
			foreach ($pr_qun_arr as $key => $value) {
				$query="update cart set quantity=$value where username='".$_SESSION['username']."' and product='$pr_name_arr[$key]'";
				mysql_query($query);
				$price=mysql_query("select price from cart where username='".$_SESSION['username']."' and product='$pr_name_arr[$key]'");
				$row = mysql_fetch_array($price);
				$total=$row[0] * $value;
				$query=mysql_query("update cart set total=$total where username='".$_SESSION['username']."' and product='$pr_name_arr[$key]'");
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
	
	function delete(){
		$hostname="sql110.byethost7.com";
$user="b7_16775419";
$password="abcdef";
$db="b7_16775419_product";
		mysql_connect($hostname,$user,$password) or die('Cant Connect');
		mysql_select_db($db) or die('Cant select db');
		mysql_query("delete from cart where id='".$GLOBALS['cart_id']."'");
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
	
	if(isset($_POST['buy'])){
		check();
	}
	
	if(isset($_POST['update'])){
		update();
	}
	
	if(isset($cart_id)){
		delete();
	}
	 
	if(isset($_POST['checkout'])){
		header('Location:checkout.php');
	}
	 
	 
	
?>