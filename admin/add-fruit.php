<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Fruit</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="save-fruit.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="f_name">Name</label>
                          <input id="f_name" type="text" name="f_name" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="f_price">Price / Kg</label>
                          <input type="number" min="0" name="f_price" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="f_desc">Description</label>
                          <textarea name="f_desc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="f_category">Category</label>
                          <select name="f_category" class="form-control">
                              <!-- <option selected disabled> Select Category</option> -->
                            <?php
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql) or die("Query Failed");

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                                    }
                                }
                            ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="f_qty">Stock in Kg</label>
                          <input type="number" min="0" name="f_qty" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Fruit image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
