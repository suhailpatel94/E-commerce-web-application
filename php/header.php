	
	<link rel="stylesheet" type="text/css" href="../css/fullcss.css">
	
	<link rel=stylesheet type=text/css href="../css/top.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<div id=hd>
		<header>
			<div id=top>

				<?php
					if(!isset($_SESSION["username"])){
				?>
				<form id=log action="submit_login_form_data.php" method=post>
					<label for="uname">Username :</label>
					<input type=text required="" name=uname id=uname autofocus>
					
					<label for="pass">Password :</label>
					<input type=password required="" name=pass id=pass>
					
					<input class=sub type=submit name=submit id=lgin value=Login!>
				
				</form>
				<?php
					}
					else{
				?>
				
				<form id=logout_fm action=logout.php method=post>
					<div id=disp_un><?php echo 'Welcome '.$_SESSION["username"]?><input type=submit id=lgout name=Logout value=Logout!></div>
					
				</form>
				<?php
				}
				?>

			</div>
		
			<div id=logops>
				<div id=logo><img src="../css/logo.png" style="text-align:center;width:300px;height:75px;"></div>
				
				<div id=social style="display:inline-block;text-align:center;">
					<a href="https://www.facebook.com/"><img src="product_images/fb.png" height="40" width="40" style="border-radius:6px;"></a>
					<a href="https://twitter.com/"><img src="product_images/twitter.jpeg" height="40" width="40" style="border-radius:6px;"></a>
					<a href=""><img src="product_images/rss.jpeg" height="40" width="40" style="border-radius:6px;"></a>
				</div>
			</div>
		</header>
		
	</div>