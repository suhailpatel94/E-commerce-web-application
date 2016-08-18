<?php
	session_start();
	
	
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel=stylesheet type=text/css href="../css/register_form.css">
	
		<script>
		
			
	function validUsername(divid) {
			var obj=document.getElementById(divid);
			if(obj.value!=""){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						var res=xmlhttp.responseText;
						if(res=='yes')
							document.getElementById(divid).setCustomValidity('username already exist');
						else
							document.getElementById(divid).setCustomValidity('');
					}
				}
				xmlhttp.open("GET","ajaxval.php?uname="+encodeURIComponent(obj.value),true);
				xmlhttp.send();
			}
		
	}
	
	function validatePassword(){
		var pass1=document.getElementById("password").value;
		var pass2=document.getElementById("password1").value;
		if(pass1!=pass2)
			document.getElementById("password1").setCustomValidity("Passwords Don't Match");
		else
			document.getElementById("password1").setCustomValidity('');	 
		//empty string means no validation error
	}
	
		
		</script>
	
		
	</head>
	
	<body>
		<?php
		
		require 'header.php';
		require 'new_menu.html';
		
			
require 'sql.php';
mysql_connect($hostname,$user,$password) or die('Cant Connect');
					mysql_select_db($db) or die('Cant select db');
	function newuser(){
		$username= $_POST['username'];
		$firstname= $_POST['firstname'];
		$lastname= $_POST['lastname'];
		$password= md5($_POST['password']);
		$email= $_POST['email'];
		$query1="insert into users values(NULL,'$username','$password','$firstname','$lastname','$email','0')";
		$query_run=mysql_query("insert into users values(NULL,'$username','$password','$firstname','$lastname','$email','0')");
		echo 'Registration Successful'.'<br>';
		header( "refresh:1; url=home.php" ); 
	}

	if(isset($_POST['submit'])){
		newuser();
	}
	
		
		?>
		<div class=form>
			<form id=contactform action="register_form.php" method=post>
				<p class=contact><label for="name">Username</label></p>
				<input type="text" id="username" name="username" placeholder="User Name" onblur="validUsername('username')" required="" tabindex=1>
				
				<p class=contact><label for="firstname">First Name</label></p>
				<input id=firstname name=firstname placeholder="First Name" required="" tabindex=2 type=text>
				
				<p class=contact><label for="lastname">Last Name</label></p>
				<input id=lastname name=lastname placeholder="Last Name" required="" tabindex=3 type=text>
				
				<p class=contact><label for="password">Password</label></p>
				<input id=password name=password placeholder="eg:password" onblur="" required="" tabindex=4 type=password>
				
				<p class=contact><label for="password1">Password</label></p>
				<input id=password1 name=password1 placeholder="eg:password" onblur="validatePassword()" required="" tabindex=4 type=password>
				
				<p class=contact><label for="email">Email</label></p>
				<input id=email name=email placeholder="eg:abc@xyz.com" required="" tabindex=5 type=email validate>
				<br>
				<input class=buttom id=submit value="sign me up!" name=submit tabindex=6 type=submit>
				<!--<p id=txt><a href="home.php">Already Registered:click for login</a></p>-->
			</form>
		</div>
		
		
		
		<?php
			require 'footer.php';
		?>
	
	</body>
</html>