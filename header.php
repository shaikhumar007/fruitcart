<?php
	include "config.php";

	if(!session_id()){
		session_start();
	  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fruit Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <!-- <link href="css/flowbite.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
  </head>
  <body class="goto-here">
	<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+91 8277493459</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">info@fruitcart.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">FRUIT&nbsp;CART</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			<?php
				$page = basename($_SERVER['PHP_SELF']);

			if($page == "index.php"){
				echo "<li class='nav-item active'><a href='index.php' class='nav-link'>Home</a></li>";
			}else{
				echo "<li class='nav-item'><a href='index.php' class='nav-link'>Home</a></li>";
			}
			if($page == "shop.php"){
				echo "<li class='nav-item active'><a href='shop.php' class='nav-link'>Shop</a></li>";
			}else{
				echo "<li class='nav-item'><a href='shop.php' class='nav-link'>Shop</a></li>";
			}
			if($page == "about.php"){
				echo "<li class='nav-item active'><a href='about.php' class='nav-link'>About</a></li>";
			}else{
				echo "<li class='nav-item'><a href='about.php' class='nav-link'>About</a></li>";
			}
			if($page == "contact.php"){
				echo "<li class='nav-item active'><a href='contact.php' class='nav-link'>Contact</a></li>";
			}else{
				echo "<li class='nav-item'><a href='contact.php' class='nav-link'>Contact</a></li>";
			}
			?>
	          <!-- <li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li> -->
			  <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php 

                            if(isset($_SESSION['user_id'])){
                            $total_cart_sql="SELECT COUNT(cart_id) AS total FROM cart WHERE user_id = '{$_SESSION['user_id']}'";
                            $total_cart_result=mysqli_query($conn,$total_cart_sql);
                            while($row=mysqli_fetch_assoc($total_cart_result)){
                                echo $row['total'];
                            }
                        }else{
                                echo 0;
                            }


                         ?>]</a></li>

	  			<?php
					if(isset($_SESSION['user_id'])){
				?>	
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Welcome, <?php echo $_SESSION['user_name'];?></b></a>
				<div class="dropdown-menu" aria-labelledby="dropdown04">
					<a class="dropdown-item" href="my-orders.php">My Orders</a>
					<a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</li>

			  <?php }else{?>

			  <li class="nav-item"><a href="login.php" class="nav-link"><b>Login</b></a></li>
			  <?php }?>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->