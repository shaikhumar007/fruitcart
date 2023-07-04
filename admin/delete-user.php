<?php
include "config.php";

$user_id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = {$user_id};";
$result = mysqli_query($conn, $sql) or die("Query Failed");

if($result){
    header("location: {$hostname}/admin/users.php");
}

mysqli_close($conn);


?>