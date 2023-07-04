<?php

include "config.php";

if(empty($_FILES["new-image"]["name"])){
    $file_name = $_POST["old-image"];
}else{
    $error = array();

    $file_name = $_FILES["new-image"]["name"];
    $file_size = $_FILES["new-image"]["size"];
    $file_tmp = $_FILES["new-image"]["tmp_name"];
    $file_type = $_FILES["new-image"]["type"];
    $file_ext = strtolower(end(explode(".", $file_name)));
    $extension = ["jpeg", "jpg", "png"];

    if(in_array($file_ext, $extension) === false){
        $error[] = 'This extension is not allowed, Please choose a JPG or PNG file';
        echo "<script>alert('This extension is not allowed, Please choose a JPG or PNG file');</script>";
    }

    if($file_size > 2097152){
        $error[] = 'The fize size is more than 2MB, The file size must be 2MB or less';
        echo "<script>alert('The fize size is more than 2MB, The file size must be 2MB or less');</script>";
    }

    if(empty($error) == true){
        move_uploaded_file($file_tmp, 'upload/' . $file_name);
    }else{
        print_r($error);
        die();
    }
}


$sql = "UPDATE fruit SET f_name = '{$_POST['f_name']}', f_desc = '{$_POST['f_desc']}', f_category = {$_POST['f_category']}, f_img = '{$file_name}'
         WHERE f_id = {$_POST['f_id']};";

$result = mysqli_query($conn, $sql) or die("Query Failed");

if($result){
    header("location: {$hostname}/admin/fruit.php");
}else{
    echo "<script>alert('Query Failed');</script>";
}

?>