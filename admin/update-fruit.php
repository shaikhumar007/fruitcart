<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Fruit</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <?php
        
        $fruit_id = $_GET['id'];

        $sql = "SELECT * FROM fruit INNER JOIN category ON fruit.f_category = category.cat_id
                WHERE fruit.f_id = {$fruit_id}";

        $result = mysqli_query($conn, $sql) or die("Query Failed");

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <!-- Form for show edit-->
        <form action="save-update-fruit.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="f_id"  class="form-control" value="<?php echo $row['f_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="f_name"  class="form-control" id="exampleInputUsername" value="<?php echo $row['f_name']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="f_desc" class="form-control"  required rows="5">
                <?php echo $row['f_desc']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="f_category">
                    <?php

                    $sql1 = "SELECT * FROM category";
                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
                    if(mysqli_num_rows($result1)){
                        while($row1 = mysqli_fetch_assoc($result1)){
                            if($row['f_category'] == $row1['cat_id']){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }
                            echo "<option {$selected} value='" . $row1['cat_id'] . "'>" . $row1['cat_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Fruit image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['f_img']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['f_img']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php 
            }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
