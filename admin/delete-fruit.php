<?php
include "config.php";

$fruit_id = $_GET['id'];
$cat_id = $_GET['catid'];

$sql1 = "SELECT * FROM fruit WHERE f_id = {$fruit_id};";
$result1 = mysqli_query($conn, $sql1) or die("Query Failed");

$row = mysqli_fetch_assoc($result1);

unlink("upload/" . $row['f_img']);

$sql = "DELETE FROM fruit WHERE f_id = {$fruit_id};";
$sql .= "UPDATE category SET cat_fruits = cat_fruits-1 WHERE cat_id = {$cat_id};";

$result = mysqli_multi_query($conn, $sql) or die("Query Failed");

if($result){
    header("location: {$hostname}/admin/fruit.php");
}

mysqli_close($conn);


?>