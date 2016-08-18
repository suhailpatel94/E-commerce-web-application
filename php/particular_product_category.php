<!DOCTYPE html>

<html>
	<head>
	
		<title>products</title>
		<link rel=stylesheet type=text/css href="../css/product_category_flex.css">
		
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
		</script>
		
		
	</head>
	
	<body>
		
		<?php
			session_start();
			
			require 'header.php';
			require 'new_menu.html';
			$cat=$_GET['cat'];
			require 'sql.php';
			mysql_connect($hostname,$user,$password) or die('Cant Connect');
			mysql_select_db($db) or die('Cant select db');
		?>
		
		<div id=title>
			<header><h3><?php echo $cat; ?></h3></header>
		</div>
		
		
			<div id=container_product_category>
				<?php
					if(isset($_POST['search']))
					{
						$srch=$_POST['search'];
						if (preg_match('/[^A-Za-z0-9][^A-Za-z0-9 ]* /', $srch) or $srch==null)
							header('Location:home.php');
						$query="select * from product_info where name LIKE '%$srch%'";
						
					}
					elseif($cat=='All Products'){
						$query="select * from product_info";
					}
					else{
						$query="select * from product_info where category='$cat' order by id";
					}
					
					$data=mysql_query($query);
					$count=mysql_num_rows($data);
					echo '<div id=title_res style="margin-left:25px;";><h3>Number of Results:'.$count.'</h3></div>';
					?>
					<div id=container_list>
						<?php
						while($info=mysql_fetch_array($data)){
							$id=$info['id'];
							$name=$info['name'];
							$cost=$info['price'];
							$categ=$info['category'];
							$img=$info['img_url'];
						?>
					
						<div class=ind_prd><a href="product.php?product_id=<?php echo $id ; ?>"><p><img src="<?php echo $img; ?>"></p><h3><?php echo $name ;?></h3><div id=product_price>$<?php echo $cost ;?></a></div></div>
					
						<?php
							}
						?>
				
					</div>
			</div>
		
		<?php
			unset($srch);
			require 'footer.php';
		?>
		
	</body>
	
		
</html>