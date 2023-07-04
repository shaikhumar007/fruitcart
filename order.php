<?php 


	include 'config.php';

	if(!session_id()){
	    session_start();
	}

	  if (isset($_SESSION['user_id'])) {

    $s_name=$_POST['name'];
    $s_email=$_POST['email'];
    $s_phone=$_POST['phone'];
    $s_address=$_POST['address'];
    $s_payment=$_POST['payment'];
    $s_user_id=$_SESSION['user_id'];
    $s_date=date("d-m-Y");//CURRENT DATE
    $s_status = "Ordered";  // Ordered(default), On Delivery, Delivered, Cancelled

    //FETCH CART ITEMS TO INSERT IT INTO ORDER TBL
    $fetch_cart_sql="SELECT * FROM cart JOIN fruit ON cart.fruit_id = fruit.f_id WHERE cart.user_id = '{$s_user_id}'";
    $fetch_cart_result=mysqli_query($conn,$fetch_cart_sql);
    while ($s_cart_row=mysqli_fetch_assoc($fetch_cart_result)) {

      $s_product_name=$s_cart_row['f_name'];
      $s_qty=$s_cart_row['cart_qty'];
      $s_price=$s_cart_row['f_price'];
      $s_total=$s_cart_row['cart_total'];
      $s_product_id=$s_cart_row['fruit_id'];

      //INSERTION IN ORDER TBL SQL
      $insertion_tbl_order_sql = "INSERT INTO orders SET
          fruit_name = '$s_product_name',
          qty = $s_qty,
          price = $s_price,
          total = $s_total,
          order_date = '$s_date',
          status = '$s_status',
          customer_name = '$s_name',
          customer_email = '$s_email',
          customer_phone = '$s_phone',
          customer_address = '$s_address',
          customer_payment = '$s_payment',
          fruit_id = '$s_product_id',
          user_id = '$s_user_id'
      ";

      mysqli_query($conn,$insertion_tbl_order_sql) or die("INSERTION FAILED. ".mysqli_error($conn));

      //REMOVING STOCK ITEMS
      $stock_sql = "UPDATE `fruit` SET `f_qty`=`f_qty`-".$s_qty." WHERE `f_id` = '{$s_product_id}'";
      mysqli_query($conn,$stock_sql);
    }

    //EMPTY CART SQL
    mysqli_query($conn,"DELETE FROM `cart` WHERE user_id=".$s_user_id);




  }
  
    //REDIRECT TO ORDER SUCCESS PAGE
  echo "<script>alert('ORDER SUCCESSFUL ✅');
  window.location.href='my-orders.php'</script>";
 ?>