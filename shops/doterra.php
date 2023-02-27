<?php 
	session_start();
	require_once("config/connection.php");
	
	?>
<!DOCTYPE HTML>
<!--April VanRavenswaay 08182018 -->
<html lang="en">
    <head>
        <title>Good Life Nutrition Health and Wellness Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/styles.css">
		<!--favicon-->
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<!--<link href="styles.css" rel="stylesheet" media="screen">-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		

        
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>	
	        <div id="container">

			
				<nav>
					<!--a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
					<ul>
						<li><a href="../index.html">Home</a></li>
						<li><a href="../about.html">Events and Services</a></li>
						<li><a href="../contact.html">Contact</a></li>
						<li><a href="../shop.html">Shop</a></li>
					</ul>

				<!--<span onclick="openNav()"><i class="material-icons" style="font-size:48px; cursor:pointer;">menu</i></span>-->
				</nav>
				
				
            <header>
               <!-- Insert Header logo here -->
			   <h2>Good Life Nutrition Health and Wellness Center</h2>
			</header>
				

            <main>
				<?php //require($_page.".php"); ?>
			<h3>Shop</h3>
				<ul id="shop">
					<li><a href="doterra.php"> doTERRA Essential Oils</a></li>
					<li><!--<a href="http://goodlifenutrition.mynsp.com"--><a href="nsp.php"> Nature's Sunshine Herbs and Vitamins</a></li>
					<li><!--<a href="http://melissarobbins.cerule.com"--><a href="cerule.php"> Cerule</a></li>
					<li><a href="otherproducts.php">Other Products</a></li>				
					<!--make shopping cart, Square payment processing, manually process-->
				</ul>
				<i class="material-icons">shopping_cart</i><a href="cart.php">Cart</a>
			<h4>doTERRA Products</h4>
				<aside>For product details or more information, please visit <a href="http://mydoterra.com/melissarobbins"> mydoterra.com/melissarobbins </a></aside>
				
				<h3 class="collapsible" id="oilsButton">Essential Oils</h3>
				<div class="content" id="oils">
					<table>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th> </th>
						</tr>
						<?php
							$sql="SELECT * FROM products WHERE productType = 'dotoils' ORDER BY name ASC";
							$res = mysqli_query($connection, $sql);
							//$query=mysql_query($sql);
							
							while($r = mysqli_fetch_assoc($res)) {
								?>
								<tr>
									<td><?php echo $r['name'] ?></td>
									<td>$<?php echo $r['price'] ?></td>
									<td><a href="addtocart.php?id=<?php echo $r['id'] ?>">Add to Cart</a></td>
								</tr>
								<?php
							}
							?>

					</table>
				
				</div>
				<h3 class="collapsible" id="personalCareButton">Personal Care</h3>
				<div class="content" id="personalCare">
					<table>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th> </th>
						</tr>
						<?php
							$sql="SELECT * FROM products WHERE productType='dotpersonalcare' ORDER BY name ASC";
							$res = mysqli_query($connection, $sql);
							//$query=mysql_query($sql);
							
							while($r = mysqli_fetch_assoc($res)) {
								?>
								<tr>
									<td><?php echo $r['name'] ?></td>
									<td>$<?php echo $r['price'] ?></td>
									<td><a href="addtocart.php?id=<?php echo $r['id'] ?>">Add to Cart</a></td>
								</tr>
								<?php
							}
							?>

					</table>
				
				</div>
				<h3 class="collapsible" id="supplementsButton">Supplements</h3>
				<div class="content" id="supplements">
					<table>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th> </th>
						</tr>
						<?php
							$sql="SELECT * FROM products WHERE productType='dotsupplements' ORDER BY name ASC";
							$res = mysqli_query($connection, $sql);
							//$query=mysql_query($sql);
							
							while($r = mysqli_fetch_assoc($res)) {
								?>
								<tr>
									<td><?php echo $r['name'] ?></td>
									<td>$<?php echo $r['price'] ?></td>
									<td><a href="addtocart.php?id=<?php echo $r['id'] ?>">Add to Cart</a></td>
								</tr>
								<?php
							}
							?>

					</table>
				
				</div>
				<h3 class="collapsible" id="collectionsButton">Collections</h3>
				<div class="content" id="collections">
					<table>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th> </th>
						</tr>
						<?php
							$sql="SELECT * FROM products WHERE productType='dotcollections' ORDER BY name ASC";
							$res = mysqli_query($connection, $sql);
							//$query=mysql_query($sql);
							
							while($r = mysqli_fetch_assoc($res)) {
								?>
								<tr>
									<td><?php echo $r['name'] ?></td>
									<td>$<?php echo $r['price'] ?></td>
									<td><a href="addtocart.php?id=<?php echo $r['id'] ?>">Add to Cart</a></td>
								</tr>
								<?php
							}
							?>

					</table>
				
				
				</div>
				<h3 class="collapsible" id="accessoriesButton">Accessories</h3>
				<div class="content" id="accessories">
					<table>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th> </th>
						</tr>
						<?php
							$sql="SELECT * FROM products WHERE productType='dotaccessories' ORDER BY name ASC";
							$res = mysqli_query($connection, $sql);
							//$query=mysql_query($sql);
							
							while($r = mysqli_fetch_assoc($res)) {
								?>
								<tr>
									<td><?php echo $r['name'] ?></td>
									<td>$<?php echo $r['price'] ?></td>
									<td><a href="addtocart.php?id=<?php echo $r['id'] ?>">Add to Cart</a></td>
								</tr>
								<?php
							}
							?>

					</table>
				
				
				</div>
				
				
				

                </main>
				
				</div>


            <footer>
					<a href="http://www.facebook.com/Good-Life-Nutrition-Health-and-Wellness-Center-1837787273178613/">	
						<img src="../images/fbButton.png" alt="facebook link button" id="facebook">
					</a>
				<h3>6230 NW Barry Rd., Kansas City, MO 64154<br>
				816-541-3896</h3>
            </footer>
<script src="main.js"></script>

				
    </body>
</html>