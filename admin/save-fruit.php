<?php
include "config.php";

if(isset($_FILES['fileToUpload'])){
    $error = [];

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $extension = ['jpeg', 'jpg', 'png'];

    if(in_array($file_ext, $extension) === false){
        $error[] = 'This extension is not allowed, Please choose a JPG or PNG file';
        $showError = "alert('This extension is not allowed, Please choose a JPG or PNG file');";
    }

    if($file_size > 2097152){
        $error[] = 'The fize size is more than 2MB, The file size must be 2MB or less';
        $showError = "alert('The fize size is more than 2MB, The file size must be 2MB or less');";
    }

    if(empty($error) == true){
        move_uploaded_file($file_tmp, 'upload/' . $file_name);
    }else{
        // echo $showError;
        echo "<script>history.back();
                {$showError}</script>";
        die();
    }

}


$name = mysqli_real_escape_string($conn, $_POST['f_name']);
$price = mysqli_real_escape_string($conn, $_POST['f_price']);
$desc = mysqli_real_escape_string($conn, $_POST['f_desc']);
$category = mysqli_real_escape_string($conn, $_POST['f_category']);
$qty = mysqli_real_escape_string($conn, $_POST['f_qty']);

$sql = "INSERT INTO fruit(f_name, f_price, f_desc, f_category, f_qty, f_img)
        VALUES('{$name}', '{$price}', '{$desc}', {$category}, {$qty}, '{$file_name}');";

$sql .= "UPDATE category SET cat_fruits = cat_fruits+1 WHERE cat_id = {$category};";

if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/fruit.php");
}else{
    echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' style='font-size: 2.6rem;' class='close' data-bs-dismiss='alert'>&times;</button>
            <strong>Query Failed!</strong>
        </div>";
}

?>