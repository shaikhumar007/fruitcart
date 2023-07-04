<?php
include "config.php";

$cat_id = $_GET['catid'];

$sql1 = "SELECT * FROM category WHERE cat_id = {$cat_id};";
$result1 = mysqli_query($conn, $sql1) or die("Query Failed");

$row = mysqli_fetch_assoc($result1);

if($row['cat_fruits'] == 0){

    $sql = "DELETE FROM category WHERE cat_id = {$cat_id}";

    $result = mysqli_query($conn, $sql) or die("Query Failed");

    if($result){
        header("location: {$hostname}/admin/category.php");
    }
}else{
    echo "<script>
            alert('FAILED !!!. This Category contains fruit');
            history.back();   
        </script>";
    // header("location: {$hostname}/admin/category.php");
}

mysqli_close($conn);


?>