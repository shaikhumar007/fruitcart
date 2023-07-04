<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Items</h1>
              </div>
              <div class="col-md-12">
              <?php 
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }

                    $limit = 10;
                    $offset = ($page - 1) * $limit;

                    
                    $sql = "SELECT * FROM orders";
                    
                    $result = mysqli_query($conn, $sql) or die("Query Failed");

                    if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Customer</th>
                          <th>Edit</th>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($result)){ ?>
                          <tr>
                              <td class='id'><?php echo $row['order_id']; ?></td>
                              <td><?php echo $row['fruit_name']; ?></td>
                              <td><?php echo $row['order_date']; ?></td>
                              <td><?php echo $row['status']; ?></td>
                              <td><?php echo $row['customer_name']; ?></td>
                              <td class='edit'><a href='update-order.php?id=<?php echo $row['order_id']; ?>'><span><i class="ion-ios-create"></i></span></i></a></td>
                              
                          </tr>
                        <?php }
                        }else{
                            echo "<h3 style='user-select: none; color: #00000091; font-weight: bold; text-align: center; margin: 100px 0;'>No Records Avalaible</h3>";
                        } ?>
                      </tbody>
                  </table>
                  <div class="pagination-style">
                  <?php
                    $sql1 = "SELECT * FROM fruit";
                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed");

                    if(mysqli_num_rows($result1) > 0){
                        
                        $total_records = mysqli_num_rows($result1);
                        
                        $total_pages = ceil($total_records/$limit);
                        
                        echo "<ul class='pagination admin-pagination'>";

                        if($page > 1){
                            echo "<li><a href='orders.php ?page=".($page - 1)."'>Prev</a></li>";
                        }
                        
                        for($i=1; $i<=$total_pages; $i++){
                            if($i == $page){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                            echo "<li class='".$active."'><a href='orders.php ?page=".$i."'>".$i."</a></li>";
                        }
                        
                        if($total_pages > $page){
                            echo "<li><a href='orders.php ?page=".($page + 1)."'>Next</a></li>";
                        }
                        echo "</ul>";
                    }
                ?>
                </div>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
