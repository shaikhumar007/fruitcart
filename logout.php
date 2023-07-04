<?php

include 'config.php';

session_start();

session_unset();

session_destroy();

echo "<script>alert('User Logged-out');</script>";

header("Location: index.php");

 ?>
