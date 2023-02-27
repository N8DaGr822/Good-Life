<?php 
	session_start();
require_once("config/connection.php");

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
//send email on load of confirmation page
$subject = 'Online Order';
		$mainEmail = 'aprilaVR@gmail.com'; //update this, just using for testing
			 
		$headers = "From: goodlifenutritionkc.com\r\n";
		$headers .= 'Content-Type: text/HTML; charset=utf-8';

								



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
				
	<?php
		$body = "
            <header>
               <!-- Insert Header logo here -->
			   <h2>Good Life Nutrition Health and Wellness Center</h2>
			</header>
			
			<main>

				
				<table>
						
		<tr>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  	</tr>";
		?>
  	
	  	<?php
		$subtotal = '';
		$i=1;
		 foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM products WHERE id = $id";
			$res=mysqli_query($connection, $sql);
			$r = mysqli_fetch_assoc($res);
		?>
			<?php
				$body .= "
	  	<tr>
	  		<td> {$r['name']} </td>
	  		<td> {$r['price']} </td>
	  	</tr> ";

			$subtotal = $subtotal + $r['price'];
			$i++; 
			} 
			$shipping = 12;
			$total = $subtotal + $shipping;
			$tax = $total * 0.1085;
			$tax = number_format($tax, 2);

			$totalplustax = $total + $tax;
			

		

			$body .= "
		<tr>
			<td>Tax</td>
			<td>$ $tax </td>
		</tr>
		<tr>
			<td>Shipping</td>
			<td>$ $shipping </td>
		</tr>
		<tr>
			<td><strong>Total</strong></td>
			<td><strong>$ $totalplustax </strong></td>
		</tr>
    </table>
	<h2>Please verify this order against paid transactions from Square via the total amount, and then proceed to process the order. Thanks! </h2>


";

 
		
		mail($mainEmail, $subject, $body, $headers);
		?>
			<h1>Order Confirmation</h1>
				<h3>Thank you for your order! Please contact us with any questions.</h3>
		
		<table class="cartTable">
			<tr>
				<th>Item Name</th>
				<th>Price</th>
			</tr>
			<?php
				$subtotalJ = '';
				$j=1;
			foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM products WHERE id = $id";
			$res=mysqli_query($connection, $sql);
			$r = mysqli_fetch_assoc($res);
			?>
				
			<tr>
				<td><?php echo $r['name']; ?></td>
				<td>$<?php echo $r['price']; ?></td>
			</tr>
			<?php	
				$subtotalJ = $subtotalJ + $r['price'];
				$j++; 
				} 
				$totalJ = $subtotalJ + $shipping;
				$taxJ = $totalJ * 0.1085;
				$taxJ = number_format($taxJ, 2);

				$totalplustaxJ = $totalJ + $taxJ;
			?>
			<tr>
				<td class="tsText">Tax</td>
			<td>$<?php echo $taxJ; ?></td>
		</tr>
		<tr>
			<td class="tsText">Shipping</td>
			<td>$<?php echo $shipping; ?></td>
		</tr>
		<tr>
			<td><strong>Total</strong></td>
			<td><strong>$<?php echo $totalplustaxJ; ?></strong></td>
		</tr>
    </table>
		
			
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


				
