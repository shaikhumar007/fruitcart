<?php 
	include 'config.php';

	$id = $_GET['id'];

	$sql = "UPDATE `orders` SET `status`='Cancelled' WHERE order_id = '{$id}'";

	if(mysqli_query($conn,$sql)){
		echo "<script>alert('Order Cancelled Successfully');</script>";
		echo "<script>window.location.href='order-detail.php?id=".$id."'</script>";
	}
 ?>