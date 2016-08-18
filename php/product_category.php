<!DOCTYPE html>

<html>
	<head>
		<title>products</title>
		<link rel=stylesheet type=text/css href="../css/product_category.css">
		
	</head>
	
	<body>
		
		<?php
			session_start();
			require 'header.php';
			require 'new_menu.html';
			
		?>
		
		<div id=title>
			<header><h3>Product Categories</h3></header>
		</div>
		<div id=container_product_category>
			<ul class=products>
				<?php
					
					require 'sql.php';
					mysql_connect($hostname,$user,$password) or die('Cant Connect');

					mysql_select_db($db) or die('Cant select db');

					$query="select * from product_category order by id";
					
					$data=mysql_query($query);
					while($info=mysql_fetch_array($data)){
						$cat=$info['category'];
						$img=$info['img'];
						$count=mysql_num_rows(mysql_query("select * from product_info where category='$cat' order by id")) ;
						$pname=mysql_query("select * from product_info where name='$cat'")
				?>
					
						<li class=product><a href="particular_product_category.php?cat=<?php echo $cat?>"><p><img src="<?php echo $img; ?>"></p><h3><?php echo $cat.'('.$count.')';?></h3></a></li>
					
				<?php
					}
				?>
				
			</ul>
		</div>
		<?php
			require 'footer.php';
		?>
	</body>
	
		
</html>