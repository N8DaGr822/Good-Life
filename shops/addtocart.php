<?php 
	session_start();
	if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
	$items = $_SESSION['cart'];
	$cartitems = explode(",", $items);
	$items .= "," . $_GET['id'];
	$_SESSION['cart'] = $items;
	header('location: doterra.php?status=success');
}else{
	$items = $_GET['id'];
	$_SESSION['cart'] = $items;
	header('location: doterra.php?status=success');
}

$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(in_array($_GET['id'], $cartitems)){
	header('location: doterra.php?status=incart');
}else{
	$items .= "," . $_GET['id'];
	$_SESSION['cart'] = $items;
	header('location: doterra.php?status=success');
	
}
?>