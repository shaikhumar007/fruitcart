<?php include "config.php"; 

session_start();

if(!isset($_SESSION['username'])){
    header("location: {$hostname}/admin");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
        <link rel="stylesheet" href="../css/ionicons.min.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="fruit.php"><img class="logo" style="width: 200%;" src="images/logo.png"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                      <div class="col-md-offset-9  col-md-1" style="color: white;"><h4>Hello&nbsp;<span style="font-style: italic;"><?php echo $_SESSION['username']; ?></span></h4></div>
                    <div class="col-md-offset-9  col-md-1">
                        <a href="logout.php" class="admin-logout" >logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="fruit.php">Fruit</a>
                            </li>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="orders.php">Orders</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
