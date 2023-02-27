<?php 
	session_start();
//require_once("config/connection.php");
if(isset($_SESSION['cart'])) {
$cartitems = $_SESSION['cart']['id'];
//$cartitems = implode(",", $items);
} 


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
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">Events and Services</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="shop.html">Shop</a></li>
					</ul>

				<!--<span onclick="openNav()"><i class="material-icons" style="font-size:48px; cursor:pointer;">menu</i></span>-->
				</nav>
				
				
            <header>
               <!-- Insert Header logo here -->
			   <h2>Good Life Nutrition Health and Wellness Center</h2>
			</header>
			
			<main>
				<ul id="shop">
					<li><a href="doterra.php"> doTERRA Essential Oils</a></li>
					<li><!--<a href="http://goodlifenutrition.mynsp.com"--><a href="nsp.php"> Nature's Sunshine Herbs and Vitamins</a></li>
					<li><!--<a href="http://melissarobbins.cerule.com"--><a href="cerule.php"> Cerule</a></li>
					<li><a href="otherproducts.php">Other Products</a></li>				
					<!--make shopping cart, Square payment processing, manually process-->
				</ul>
				<h1>View Cart</h1>
				<form method="post" action="convergetest.php"><!--"checkout.php"-->
				
				<table class="cartTable">
						
		<tr>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  	</tr>
  	
	  	<?php
		$subtotal = '';
		$i=1;
		if(isset($_SESSION['cart'])) {
		 foreach ($cartitems as $id) {
			$sql = "SELECT * FROM products WHERE id = {$id}";
			$res=mysqli_query($connection, $sql);
			if(!empty($res)) {
			while($r = mysqli_fetch_assoc($res)) {

		?>	  	
	  	<tr>
	  		<td><?php echo $r['name']; ?><a href="delcart.php?remove=<?php echo $id; ?>">Remove</a></td>
	  		<td>$<?php echo $r['price']; ?></td>
	  	</tr>
		<?php 
				$subtotal = $subtotal + $r['price'];
				$i++; 
			}
			}
		 }
		} else {
			echo "Your cart is empty.";
		}
			//$tax = $subtotal * 0.1085;
			$shipping = 12;
			$total = $subtotal + $shipping;

		?>

		<tr>
			<td class="tsText">Shipping</td>
			<td>$<?php echo $shipping; ?></td>
		</tr>
		<tr>
			<td><strong>Total Before Tax</strong></td>
			<td><strong>$<?php echo $total; ?><input type="hidden" name="total" value="<?php echo $total; ?>"></strong></td>
		</tr>
		<tr><aside>Please note we are unable to process returns or refunds at this time. Please <a href="contact.html">Contact</a> us with questions regarding this return policy.</aside></tr>

    </table>
		<button name="clear"><a href="destroy.php">Clear Cart</a></button>
		<button type="submit" name="submit">Go to Checkout</button>
		<aside>Checkout will redirect to a secure page</aside>
		
		<h2><a href="shop.html">Continue Shopping</a></h2>

</form> 

								
			
			</main>
			</div>


            <footer>
					<a href="http://www.facebook.com/Good-Life-Nutrition-Health-and-Wellness-Center-1837787273178613/">	
						<img src="images/fbButton.png" alt="facebook link button" id="facebook">
					</a>
				<h3>6230 NW Barry Rd., Kansas City, MO 64154<br>
				816-541-3896</h3>
            </footer>
	<script src="main.js"></script>

				
    </body>
</html>
				
