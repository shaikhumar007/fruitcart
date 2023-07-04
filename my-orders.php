<?php include "header.php"; ?>

    <div class="hero-wrap hero-bread" style="background: linear-gradient(#00000087, #00000026),url(images/bg_3.jpg); background-size: cover; ">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Orders</h1>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
    					 <?php 
		                    $sql="SELECT * FROM orders JOIN fruit ON orders.fruit_id = fruit.f_id WHERE orders.user_id = '{$_SESSION['user_id']}' ORDER BY orders.order_id DESC";
		                    $result=mysqli_query($conn,$sql) or die("QUERY FAILED");
		                    if(mysqli_num_rows($result)>0){
		                 ?>
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Quantity (KG)</th>
						        <th>Total</th>
						        <th>Status</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php 
									 while($row = mysqli_fetch_assoc($result)){
		                         ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="order-detail.php?id=<?php echo $row['order_id']; ?>"><span class="ion-ios-eye"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(admin/upload/<?php echo $row['f_img']; ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row['f_name']; ?></h3>
						   
						        </td>
						        
						        <td class="price"><?php echo $row['qty']; ?></td>
						        
						        <td class="quantity">
						        	₹<?php echo $row['total']; ?>
					          </td>
						        
						        <td class="total"><?php echo $row['status']; ?></td>
						      </tr><!-- END TR-->
						      <?php } ?>
						     
						    </tbody>
						  </table>
						  <?php }else{
					                echo "<h1>CART IS EMPTY</h1>";
					            } ?>
					  </div>
    			</div>
    		</div>
    		
		</div>
	</section>

<?php include "footer.php"; ?>