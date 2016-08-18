<?php
	session_start();
?>
<!DOCTYPE html>	
<html>

	<head>
		<title>cart</title>
		
	</head>
	
	<body>
	
		<?php
			
			$final=0.00;
		
			
			require 'header.php';
			require 'new_menu.html';
			if(!isset($_SESSION['username'])){
				echo '<h3 style="margin-left:25px;";>Please login to view your cart</h3>';
			}
			else{
				require 'sql.php';
				mysql_connect($hostname,$user,$password) or die('Cant Connect');
				mysql_select_db($db) or die('Cant select db');

				$queryp="select * from cart where username='".$_SESSION['username']."' order by product";
				$data=mysql_query($queryp);

				if(mysql_num_rows($data)!=0){
		?>			
				
				
				<div id=title>
					<header><h3>Cart</h3></header>
				</div>
				
				<form id=cart_proc action=add_to_cart.php method=post>
					<table>
								<tr>
									<th></th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total</th>
									<th>Action</th>
								</tr>
						<?php
							
							while($info=mysql_fetch_array($data)){
								
								$id=$info['id'];
								$img=$info['img_url'];
								$pr_name=$info['product'];
								$price=$info['price'];
								$quantity=$info['quantity'];
								$totl=$info['total'];
								$final=(string)$final+$totl;
						?>
							
								<tr>
									<td><img style="border-radius:5px;" width=70 height=70 src='<?php echo $img;?>'></td>
									<td><?php echo $pr_name; ?></td>
									<td><input type=number id=product_quantity name=product_quantity[] min=1 step=1 size=30 required value=<?php echo $quantity;?>>
										<input type=hidden id=product_name name=product_name[] value='<?php echo $pr_name;?>'>
									</td>
									<td><?php echo '$ '.$price; ?></td>
									<td><?php echo '$ '.$totl; ?></td>
									<td>
									
										<a href=add_to_cart.php?sid=<?php echo $id; ?>><input type=button value=Remove id=Remove name=Remove></a>
										  
									
									
									</td>
								</tr>
								
								
						<?php
							
							}
						
						?>
							<tr>
							<td colspan=4><div style="text-align:center;" id=disp_total><h3>Total--<?php echo '$ '.number_format((float)$final, 2, '.', '');?></h3></div></td>
							</tr>
					</table>
					
					<input id=updt_btn type=submit id=update name=update value="Update Cart">
					
					
						<input id=chckout_btn type=submit id=checkout name=checkout value="Proceed to Checkout">
					
					
					
				</form>
							
					
				<?php
				}
				else{
					echo '<h2 style="margin-left:25px;";>cart is empty</h2>';
				}
			}
			
			unset($product_quantity);
			unset($product_name);
			?>
			
			<div id=title>
			<header><h3>Featured Products</h3></header>
			</div>
			
			<div id=container_product_category>
			<ul class=products>
				<?php
				
					require 'sql.php';
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