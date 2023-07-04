<?php
    
    if(!session_id()){
          session_start();
        }
        
if(isset($_SESSION['user_name']))
    {
      header("Location: index.php");
    }
    
  if(isset($_POST['submit'])){
    include 'config.php';
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $re_type_password=md5($_POST['confirmpassword']);

    $emailcheck="SELECT * FROM users WHERE email='{$email}'";
    $resultemailcheck=mysqli_query($conn,$emailcheck) or die("Query Failed");
        if(mysqli_num_rows($resultemailcheck)>0){
          echo "<script>alert('Email Exists')</script>";
        }
        else{
          if($password==$re_type_password){
            $sql="INSERT INTO users (name,email,password) VALUES ('{$name}','{$email}','{$password}')";
            mysqli_query($conn,$sql);

            //AUTO-LOGIN
            $sql2="SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
            $result2=mysqli_query($conn,$sql2) or die("Query Failed");

            if(mysqli_num_rows($result2)>0){
              while($row2=mysqli_fetch_assoc($result2)){

                if(!session_id()){
                  session_start();
                }

                // SESSION VARIABLES DECLARATION !IMPORTANT
                $_SESSION['user_id']=$row2['id'];
                $_SESSION['user_name']=$row2['name'];
                $_SESSION['user_email']=$row2['email'];



             //header('Location:  index.php');
              }

            }
            echo "<script>location.replace('index.php');</script>";


          }
          else{
            echo "<script>alert('Password not matched.')</script>";
          }
        }

  }

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="css/flowbite.min.css"  rel="stylesheet" />
    <style type="text/css">
        section{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>

    <section>
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Create you Account</h5>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Name" required>
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@domain.com" required>
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>

                <div>
                    <label for="confirmpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Your password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                
                <button type="submit" name='submit' class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Already Have Account? <a href="login.php" class="text-blue-700 hover:underline dark:text-blue-500">Login Account</a>
                </div>
            </form>
        </div>
    </section>

<script src="js/flowbite.min.js"></script>
</body>
</html>