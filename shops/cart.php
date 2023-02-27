<?php 
	session_start();
require_once("config/connection.php");

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);



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
			<link href="styles/print.css" rel="stylesheet" media="print">
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
				<h1>View Cart</h1>
				<form method="post" action="checkout.php">
				
				<table class="cartTable">
						
		<tr>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  	</tr>
  	
	  	<?php
		$subtotal = '';
		$i=0;
		 foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM products WHERE id = $id";
			$res=mysqli_query($connection, $sql);
			$r = mysqli_fetch_assoc($res);
			$numrows = mysqli_num_rows($res);
		if($numrows == 0) {
		header('location:cart.php');
		echo "Your cart is empty.";
		}
	
		?>	  	
	  	<tr>
	  		<td><?php echo $r['name']; ?><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a></td>
	  		<td>$<?php echo $r['price']; ?></td>
	  	</tr>
		<?php 
			$subtotal = $subtotal + $r['price'];
			$i++; 
			} 
			$tax = $subtotal * 0.1085;
			$shipping = 12;
			$total = $subtotal + $shipping;
		?>
		
		
		<!--<tr>
			<td>Tax</td>
			<td>$<?php echo $tax; ?></td>
		</tr>-->
		<tr>
			<td class="tsText">Shipping</td>
			<td>$<?php echo $shipping; ?></td>
		</tr>
		<tr>
			<td><strong>Total Before Tax</strong></td>
			<td><strong>$<?php echo $total; ?><input type="hidden" name="total" value="<?php echo $total; ?>"></strong></td>
		</tr>
		<tr><aside>Tax will be added at checkout</aside></tr>
    </table>
		<button type="submit" name="submit">Go to Checkout</button>
		<aside>Checkout will redirect to a secure page</aside>

</form> 

								
			
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
				
