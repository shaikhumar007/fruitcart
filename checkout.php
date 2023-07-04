<?php include "header.php"; ?>

<?php 


        if(!isset($_SESSION['user_name']))
        {
          echo "<script>window.location.href='login.php'</script>";
        }

        if(!isset($_GET['status'])){
            echo "<script>window.location.href='login.php'</script>";
        }
     ?>

<div class="hero-wrap hero-bread"
	style="background: linear-gradient(#00000087, #00000026),url(images/bg_3.jpg); background-size: cover;');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				<!-- FORM START -->
				<?php
				$sql = "SELECT * FROM users";
				$result = mysqli_query($conn, $sql) or die("Query Failed.");

				$row = mysqli_fetch_assoc($result);
				?>
				<form action="order.php" method="POST" class="billing-form">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">Name</label>
								<input type="text" name="name" class="form-control" placeholder="" value="<?php echo $row['name']; ?>">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="streetaddress">Address</label>
								<input type="text" name="address" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" name="phone" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email Address</label>
								<input type="email" name="email" class="form-control" placeholder="" value="<?php echo $row['email']; ?>">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="w-100"></div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="cart-detail p-3 p-md-4">
								<h3 class="billing-heading mb-4">Payment Method</h3>
	
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2" disabled> Paypal</label>
										</div>
									</div>
								</div>
	
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="payment" class="mr-2" value="Cash On Delivery" required checked> Cash on
												Delivery</label>
										</div>
									</div>
								</div>
	
								<p><button type="submit" name="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
							</div>
						</div>
					</div>
				</form>
				<!-- FORM END -->
			</div>
			<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>
							
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								 <?php 
                            $grand_total=0;

                            $fetch_cart_sql="SELECT * FROM cart JOIN fruit ON cart.fruit_id = fruit.f_id WHERE cart.user_id = '".$_SESSION['user_id']."'";
                            $fetch_cart_result=mysqli_query($conn,$fetch_cart_sql);
                            while ($s_cart_row=mysqli_fetch_assoc($fetch_cart_result)) {
                         
                            	 $grand_total=$s_cart_row['cart_total'] + $grand_total; 
                         } ?>
								<span>₹<?php echo $grand_total; ?></span>
							</p>
						</div>
					</div>

				</div>
			</div> <!-- .col-md-8 -->
		</div>
	</div>
</section> <!-- .section -->

<?php include "footer.php"; ?>