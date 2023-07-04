<?php include "header.php";
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">Add Category</a>
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

                $sql = "SELECT * FROM category ORDER BY cat_id DESC LIMIT {$offset}, {$limit}";
                $result = mysqli_query($conn, $sql) or die("Query Failed");

                if(mysqli_num_rows($result)){
                ?>
                <table class="content-table">
                    <thead>
                        <th>ID No.</th>
                        <th>Category Name</th>
                        <th>No. of Fruits</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td class='id'><?php echo $row['cat_id']; ?></td>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td><?php echo $row['cat_fruits']; ?></td>
                            <td class='edit'><a href='update-category.php?catid=<?php echo $row['cat_id']; ?>'><span><i class="ion-ios-create"></i></span></a></td>
                            <td class='delete'><a href='delete-category.php?catid=<?php echo $row['cat_id']; ?>'><span><i class="ion-ios-trash"></i></span></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="pagination-style">
                <?php 
                $sql1 = "SELECT * FROM category";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed");

                if(mysqli_num_rows($result1)){
                    echo "<ul class='pagination admin-pagination'>";
                    if($page > 1){
                        echo "<li><a href='category.php?page=".($page - 1)."'>Prev</a>";
                    }
                    
                    $total_records = mysqli_num_rows($result1);
                    
                    $total_pages = ceil($total_records/$limit);

                    for($i=1; $i<=$total_pages; $i++){
                        if($i == $page){
                            $active = "active";
                        }else{
                            $active = "";
                        }
                        echo "<li class='".$active."'><a href='category.php?page=".$i."'>".$i."</a></li>";
                    }
                    if($total_pages > $page){
                        echo "<li><a href='category.php?page=".($page + 1)."'>Next</a>";
                    }
                    echo "</ul>";
                }
                }else{
                    echo "<h3 style='user-select: none; color: #00000091; font-weight: bold; text-align: center; margin: 100px 0;'>No Records Avalaible</h3>";
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
