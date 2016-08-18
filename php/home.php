<!DOCTYPE html>

<html>
	<head>
		<title>Home page</title>
		<link rel=stylesheet type=text/css href="../css/product_category.css">
		<link rel=stylesheet type=text/css href="../css/home.css">
	</head>
	
	<body>
		
		<?php
			session_start();
			
			require 'header.php';
			require 'new_menu.html';
			require 'sql.php';
			
		?>
		
		
		<div id=img_slider>
		
			<figure>
				<img src="../css/slide1.jpg"  alt="">
				<img src="../css/slide2.jpg"  alt="">
				<img src="../css/slide3.jpg"  alt="">
				<img src="../css/slide4.jpg"  alt="">
				<img src="../css/slide1.jpg"  alt="">
			</figure>
		
		</div>
	
		
		
		<div id=title>
			<header><h3>Featured Products</h3></header>
		</div>
		
		
		<div id=container_product_category>
			<ul class=products>
				<?php
					mysql_connect($hostname,$user,$password) or die('Cant Connect');
					mysql_select_db($db) or die('Cant select db');
					$query="select * from product_info where featured=1 limit 8";
					$query_data=mysql_query($query);
				
					while($info=mysql_fetch_array($query_data)){
						$id=$info['id'];
						$name=$info['name'];
						$cost=$info['price'];
						$categ=$info['category'];
						$img=$info['img_url'];
				?>
					<li class=product><a href="product.php?product_id=<?php echo $id ;?>"><p><img src="<?php echo $img; ?>"></p><h3><?php echo $name ;?></h3><div id=product_price>$<?php echo $cost ;?></div></a></li>
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