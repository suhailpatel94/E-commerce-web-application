<?php session_start(); ?>
<!DOCTYPE html>

<html>
	<head>
	
		<title>products</title>
		<link rel=stylesheet type=text/css href="../css/product.css">
		<link rel=stylesheet type=text/css href="../css/product_category.css">
		
		<script src="jquery-2.1.3.js"></script>
		<?php if(isset($_SESSION['username'])){  ?>
		<script>
			$(document).ready(function(){
				 $("#buy").click(function(){
					$("#dyn").html("Added to Cart!");
				});
			});
			
		</script>
		<?php } 
		
		else{  ?>
		<script>
			$(document).ready(function(){
				 $("#buy").click(function(){
					$("#dyn").html("Please login");
				});
			});
			
		</script>
		<?php } ?>
	</head>
	
	<body>
		
		<?php
			
			
			require 'header.php';
			require 'new_menu.html';
			require 'sql.php';
			
			$id=$_GET['product_id'];
			
			mysql_connect($hostname,$user,$password) or die('Cant Connect');

			mysql_select_db($db) or die('Cant select db');

			$query="select * from product_info where id='$id'";
			
			$data=mysql_query($query);
			while($info=mysql_fetch_array($data)){
				$name=$info['name'];
				$cat=$info['category'];
				$img=$info['img_url'];	
				$descr=$info['description'];
				$price=$info['price'];
		?>
		
		<h2><div id=dyn style="margin-left:25px;text-align:center"></div></h2>
		<div id=product_container>
		
				<div id=product_img><img src="<?php echo $img; ?>"></div>
				<div id=product_info><header><h3><?php echo $name ;?></h3></header>
					<div id=product_price><h2><?php echo '$ '.$price ;?></h2></div>
					<div id="description"><?php echo $descr ;?></div>
					
					<form id=buy_btn action=add_to_cart.php method=post>
						<input type=number min=1 id=no_of_product name=no_of_product value=1 size=4 step=1> 
						<input type=hidden name=id value= <?php echo $id ;?>>
						<input type=hidden name=price value= <?php echo $price ;?>>
						<input type=hidden id=product_name name=product_name value= '<?php echo $name ;?>'>
						<input type=hidden id=img name=img value= '<?php echo $img ;?>'>
						<input id=buy type=submit name=buy value="Add to cart">
					</form>
				</div>
			
			<?php
				}
			?>
			
		
		</div>
		
		<div id=related_products>
			<div id=title>
				<header><h3>Related Products</h3></header>
			</div>
			
			<div id=container_product_category>
				<ul class=products>
					<?php
						
						if($cat=='All Products'){
							$query="select * from product_info";
						}
						else{
							$query="select * from product_info where category='$cat' and id!='$id' order by rand() limit 6";
						}
						
						$data=mysql_query($query);
						while($info=mysql_fetch_array($data)){
							$id=$info['id'];
							$name=$info['name'];
							$cost=$info['price'];
							$categ=$info['category'];
							$img=$info['img_url'];
					?>
					
						<li class=product><a href="product.php?product_id=<?php echo $id ; ?>"><p><img src="<?php echo $img; ?>"></p><h3><?php echo $name ;?></h3><div id=product_price>$<?php echo $cost ;?></a></div></li>
					
					<?php
						}
					?>
					
				</ul>
			</div>
			
		</div>
		
		<?php
			require 'footer.php';
		?>
		
		
	</body>
	
		
</html>