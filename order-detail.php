<?php include "header.php"; ?>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
        <?php
        
        $fid = $_GET['id'];

        $sql = "SELECT * FROM orders JOIN fruit ON orders.fruit_id = fruit.f_id WHERE orders.order_id = '{$fid}'";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");

        $row = mysqli_fetch_assoc($result);
        ?>
          <div class="col-lg-6 mb-5 ftco-animate">
            <a href="admin/upload/<?php echo $row['f_img']; ?>" class="image-popup"><img src="admin/upload/<?php echo $row['f_img']; ?>" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-lg-6 product-details pl-md-5 ftco-animate">
            <h3><?php echo $row['f_name']; ?></h3>
            <p class="price"><span>₹&nbsp;<?php echo $row['total']; ?> (<?php echo $row['qty']; ?>KG)</span></p>
            
            <p class="mb-4">Name : <?php echo $row['customer_name']; ?></p>
                <p class="mb-4">Email : <?php echo $row['customer_email']; ?></p>
                <p class="mb-4">Phone : <?php echo $row['customer_phone']; ?></p>
                <p class="mb-4">Address : <?php echo $row['customer_address']; ?></p>
                <p class="mb-4">Order Status : <?php echo $row['status']; ?></p>
                <p class="mb-4">Payment Method : <?php echo $row['customer_payment']; ?></p>
            <p>
              <?php if($row['status'] == 'Ordered' OR $row['status'] == 'On Delivery'){ ?>
                  <a href="cancel-order.php?id=<?php echo $row['order_id']; ?>" class="btn btn-black py-3 px-5">CANCEL ORDER</a>
              <?php } ?>
              
            </p>
          </div>
        </div>
      </div>
    </section>


<?php include "footer.php"; ?>