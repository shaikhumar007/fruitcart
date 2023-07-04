<?php include "header.php"; ?>

    <div class="hero-wrap hero-bread" style="background: linear-gradient(#00000087, #00000026),url(images/bg_3.jpg); background-size: cover; ">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Shop</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
					<?php
					if(isset($_GET['catid'])){
						$catid = $_GET['catid'];
					}else{
						$catid = 1;
					}

					$sql1 = "SELECT * FROM category";
					$result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
					
					if(mysqli_num_rows($result1) > 0){
						while($row = mysqli_fetch_assoc($result1)){
						if($row['cat_id'] == $catid){
							$active = "active";
						}else{
							$active = "";
						}
						echo "<li><a href='shop.php?catid=".$row['cat_id']."' class='$active'>".$row['cat_name']."</a></li>";
						
						}
					}	
					?>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
			<?php
				$sql = "SELECT * FROM fruit WHERE f_category = {$catid}";
				$result = mysqli_query($conn, $sql) or die("Query Failed.");

				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
				?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="fruit-single.php?fid=<?php echo $row['f_id']; ?>" class="img-prod"><img class="img-fluid" src="admin/upload/<?php echo $row['f_img']; ?>" alt="fruit_img">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="fruit-single.php?fid=<?php echo $row['f_id']; ?>"><?php echo $row['f_name']; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>₹&nbsp;<?php echo $row['f_price']; ?></span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
				<?php
					}
				}else{
					echo "<h2>No Fruits Available</h2>";
				}
				?>
    		</div>
</section>


<?php include "footer.php"; ?>