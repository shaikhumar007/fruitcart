<?php 

	if(!session_id()){
          session_start();
        }

	include 'config.php';

	$product_id = $_GET['id'];
	if($product_id == 0){
		echo "<script>alert('You Need to Log-in');</script>";
		echo "<script>window.location.href='login.php'</script>";
		die();
	}

	$user_id =$_SESSION['user_id'];
	$cart_qty = 1;
	$cart_total = $_GET['price'];

	$sql = "INSERT INTO `cart`(`fruit_id`, `cart_qty`, `cart_total`, `user_id`) VALUES ('{$product_id}','{$cart_qty}','{$cart_total}','{$user_id}')";

	if(mysqli_query($conn,$sql)){
		echo "<script>alert('ADDED TO CART SUCCESSFULLY');</script>";
		echo "<script>window.location.href='fruit-single.php?fid=".$product_id."'</script>";
	}else{
		echo "<script>alert('FAILED TO ADD IN CART');</script>";
		echo "<script>window.location.href='fruit-single.php?fid=".$product_id."'</script>";
	}
 ?>