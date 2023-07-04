<?php include "header.php"; ?>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
				<?php
				
				$fid = $_GET['fid'];

				$sql = "SELECT * FROM fruit WHERE f_id = {$fid}";
				$result = mysqli_query($conn, $sql) or die("Query Failed.");

				$row = mysqli_fetch_assoc($result);
				?>
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="admin/upload/<?php echo $row['f_img']; ?>" class="image-popup"><img src="admin/upload/<?php echo $row['f_img']; ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $row['f_name']; ?></h3>
    				<p class="price"><span>₹&nbsp;<?php echo $row['f_price']; ?></span></p>
    				<p>
						<?php echo $row['f_desc']; ?>
					</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="" selected>In Kg</option>
	                    <option value="" disabled>In Grams</option>
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
	          	<div class="w-100"></div>
          	</div>
          	<p>
          		<?php 
                        if($row['f_qty'] == 0){
                            echo '<a class="btn btn-black py-3 px-5">OUT OF STOCK</a>';
                        }else{

                        
                        if(isset($_SESSION['user_id'])){
                        $cart_sql = "SELECT * FROM cart WHERE fruit_id = '{$_GET['fid']}' AND user_id = '{$_SESSION['user_id']}'";
                        $cart_result = mysqli_query($conn,$cart_sql);
                        if(mysqli_num_rows($cart_result) > 0){
                     ?>
                     <a href="cart.php" class="btn btn-black py-3 px-5">View Cart</a>
                     <?php }else{ ?>
          		<a href="add-to-cart.php?id=<?php echo $fid ?>&price=<?php echo $row['f_price']; ?>" class="btn btn-black py-3 px-5">Add to Cart</a>
          	 <?php }}else{ ?>
          	 
          	 	<a href="add-to-cart.php?id=0" class="btn btn-black py-3 px-5">Add to Cart</a>
          	 	<?php }} ?>
          	</p>
    			</div>
    		</div>
    	</div>
    </section>


<?php include "footer.php"; ?>