<?php include "header.php";

if(isset($_POST['save'])){
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat']);
    
    $sql = "SELECT * FROM category WHERE cat_name = '{$cat_name}';";
    $result = mysqli_query($conn, $sql) or die("Query Failed");

    if(mysqli_num_rows($result) > 0){
        echo "<div class='alert alert-danger alert-dismissible show'>
                <button type='button' style='font-size: 2.6rem;' class='close' data-bs-dismiss='alert'>&times;</button>
                <strong>Failed!</strong> Category '{$cat_name}' Already Exists.
              </div>";
    }else{
        $sql1 = "INSERT INTO category(cat_name) VALUES('{$cat_name}');";
        mysqli_query($conn, $sql1) or die("Query Failed");
        header("location: {$hostname}/admin/category.php");
    }
    
    


}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                      <a href="category.php" class="btn btn-primary">Don't Save</a>
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
