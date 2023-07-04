<?php

if(!session_id()){
  session_start();
}

include 'config.php';

if(isset($_POST['qty'])){
  $qty=$_POST['qty'];
  $pid=$_POST['pid'];
  $pprice=$_POST['pprice'];

  $tprice =$qty*$pprice;

  $stmt=$conn->prepare("UPDATE cart SET cart_qty=?,cart_total=? WHERE cart_id=?");

  $stmt->bind_param("iii",$qty,$tprice,$pid);
  $stmt->execute();
}


 ?>
