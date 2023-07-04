<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
            <?php
                $cat_id = $_GET['catid'];

                $sql = "SELECT * FROM category WHERE cat_id = {$cat_id}";

                $result = mysqli_query($conn, $sql) or die("Query Failed");

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['cat_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['cat_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                <?php
                    }
                }

                if(isset($_POST['submit'])){
                    $new_catname = $_POST['cat_name'];
                    // $new_catid = $_POST['cat_id'];
                
                    $sql = "UPDATE category SET cat_name = '{$new_catname}' WHERE cat_id = {$cat_id};";
                
                    $result = mysqli_query($conn, $sql) or die("Query Failed");
                
                    if($result){
                        header("location: {$hostname}/admin/category.php");
                    }else{
                        echo "<script>alert('Query Failed');</script>";
                    }
                }
                
                ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
