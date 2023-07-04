<?php include "header.php"; ?>
<?php 
        if(!isset($_SESSION['user_name']))
        {
          echo "<script>alert('You Need to Log-in');</script>";
        echo "<script>window.location.href='login.php'</script>";
        }
     ?>
    <div class="hero-wrap hero-bread" style="background: linear-gradient(#00000087, #00000026),url(images/bg_3.jpg); background-size: cover; ">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
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
		                    $sql="SELECT * FROM cart JOIN fruit ON cart.fruit_id = fruit.f_id WHERE cart.user_id = '{$_SESSION['user_id']}' ORDER BY cart.cart_id DESC";
		                    $result=mysqli_query($conn,$sql) or die("QUERY FAILED");
		                    if(mysqli_num_rows($result)>0){
		                 ?>
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity (KG)</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php 
									 while($row = mysqli_fetch_assoc($result)){
		                         ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="delete-cart-item.php?id=<?php echo $row['cart_id']; ?>"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(admin/upload/<?php echo $row['f_img']; ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row['f_name']; ?></h3>
						   
						        </td>
						        
						        <td class="price">₹<?php echo $row['f_price']; ?></td>
						        
						        <td class="quantity">
						        	<input type="hidden" class="pid" value="<?php echo $row['cart_id']; ?>">
                            		<input type="hidden" class="pprice" value="<?php echo $row['f_price']; ?>">

						        	<input type="number" class="itemQty" value="<?php echo $row['cart_qty']; ?>" min="1">
					          </td>
						        
						        <td class="total">₹<?php echo $row['cart_total']; ?></td>
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
    		<div class="row justify-content-end">
    			
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>₹<?php 

                    //fetch total of all cart products
                      $fetch_gtotal_sql="SELECT SUM(cart_total) AS Total FROM cart WHERE user_id='".$_SESSION['user_id']."'";
                      $fetch_gtotal_result=mysqli_query($conn,$fetch_gtotal_sql) or die("FETCH FAILED. ".mysqli_error($conn));



                      //Get the VAlue
                      $row4 = mysqli_fetch_assoc($fetch_gtotal_result);

                      //GEt the Total REvenue
                      echo $total_revenue = $row4['Total'];

                             ?></span>
    					</p>
    				</div>
    				<p><a href="checkout.php?status=true" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
		</div>
	</section>
<script type="text/javascript">
  $(document).ready(function(){

    $(".itemQty").on('change',function(){
      var $el = $(this).closest('td');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url:'manage-cart-item.php',
        method:'post',
        cache: false,
        data:{qty:qty,pid:pid,pprice:pprice},
        success: function(response){
          console.log(response);
        }
      })
      // alert('ok');
    });

  });
</script>
<?php include "footer.php"; ?>