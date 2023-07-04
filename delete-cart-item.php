<?php 

	include 'config.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM cart WHERE `cart`.`cart_id` = '{$id}'";
	mysqli_query($conn,$sql);

	echo "<script>alert('Item Removed from Cart');</script>";
	echo "<script>window.location.href='cart.php'</script>";
 ?>