<!DOCTYPE html>
<html>
<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location:cart.php');
}

include 'header.php';
require 'new_menu.html';
$final=0.0;
$cart_items = 0;
?>
	<head>
		<title>Checkout</title>
		<link rel=stylesheet href="../css/checkout.css">
	</head>
	
	
	<body>
	
		<?php
				require 'sql.php';
				mysql_connect($hostname,$user,$password) or die('Cant Connect');
				mysql_select_db($db) or die('Cant select db');
				$queryp="select * from cart where username='".$_SESSION['username']."' order by product";
				$data=mysql_query($queryp);
		?>
		<h2><p style="margin-left:25px;">Bill</p></h2>
		<div id=bill>
			<form id=cart_proc method=post action="ppec/process.php">
					<table>
								<tr>
									<th></th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total</th>
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
									<td><?php echo $quantity;?>
										
									</td>
									<td><?php echo '$ '.$price; ?></td>
									<td><?php echo '$ '.$totl; ?></td>
									<?php
									echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$pr_name.'" />';
									echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$id.'" />';
									echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$id.'" />';
									echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$quantity.'" />';
									$cart_items ++;
								
					?>
								</tr>
								
								
						<?php
							
							}
						
						?>
							<tr>
							<td colspan=4><div style="text-align:center;" id=disp_total><h3>Total--<?php echo '$ '.number_format((float)$final, 2, '.', '');?></h3></div></td>
							</tr>
					</table>
					
					
						<input type=submit value=Buy id=buyall name=buyall>
					
					
			</form>
				
		</div>
		
		
		<?php require 'footer.php';?>
		
	</body>
	
	
	
</html>