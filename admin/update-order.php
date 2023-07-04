<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Order</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
            <?php
                $cat_id = $_GET['id'];

                $sql = "SELECT * FROM orders WHERE order_id = {$cat_id}";

                $result = mysqli_query($conn, $sql) or die("Query Failed");

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" value="<?php echo $row['customer_name']; ?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Phone</label>
                          <input type="text" name="phone" class="form-control" value="<?php echo $row['customer_phone']; ?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" value="<?php echo $row['customer_email']; ?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Address</label>
                          <input type="text" name="address" class="form-control" value="<?php echo $row['customer_address']; ?>"  placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Status</label>
                          <select name="status">
                            <?php 
                                if($row['status'] == 'Ordered'){
                                  echo '<option value="Ordered" selected>Ordered</option>
                                      <option value="On Delivery">On Delivery</option>
                                      <option value="Delivered">Delivered</option>
                                      <option value="Cancelled">Cancel Order</option>';
                                }elseif($row['status'] == 'On Delivery'){
                                  echo '<option value="Ordered">Ordered</option>
                                      <option value="On Delivery" selected>On Delivery</option>
                                      <option value="Delivered">Delivered</option>
                                      <option value="Cancelled">Cancel Order</option>';
                                }elseif($row['status'] == 'Delivered'){
                                  echo '<option value="Ordered">Ordered</option>
                                      <option value="On Delivery">On Delivery</option>
                                      <option value="Delivered" selected>Delivered</option>
                                      <option value="Cancelled">Cancel Order</option>';
                                }else{
                                  echo '<option value="Ordered">Ordered</option>
                                      <option value="On Delivery">On Delivery</option>
                                      <option value="Delivered">Delivered</option>
                                      <option value="Cancelled" selected>Cancel Order</option>';
                                }
                             ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                <?php
                    }
                }

                if(isset($_POST['submit'])){
                    //VARIABLES
                    $name = $_POST['name'];
                    $phone =  $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $status = $_POST['status'];


                    //QUERIES
                    $sql="UPDATE orders SET customer_name = '{$name}',
                                customer_phone = '{$phone}',
                                customer_email = '{$email}',
                                customer_address = '{$address}',
                                status = '{$status}' 
                                WHERE order_id='{$cat_id}'";
                    mysqli_query($conn,$sql);
                    
                    //ACTIONS
                    echo "<script>alert('ORDER SUCCESSFULLY UPDATED');</script>";
                    echo "<script>window.location.href='orders.php'</script>";
                }
                
                ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
