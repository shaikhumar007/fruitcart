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
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=md5($_POST['password']);

    $sql="SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result=mysqli_query($conn,$sql) or die("Query Failed");

    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){

        if(!session_id()){
          session_start();
        }

        // SESSION VARIABLES DECLARATION !IMPORTANT
        $_SESSION['user_id']=$row['id'];
        $_SESSION['user_name']=$row['name'];
        $_SESSION['user_email']=$row['email'];

        echo "<script>location.replace('index.php');</script>";
      }

    }
    else{
      echo "<script>alert('Login Failed')</script>";
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
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Log in</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@domain.com" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit">LOGIN</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="register.php" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                </div>
            </form>
        </div>
    </section>

<script src="js/flowbite.min.js"></script>
</body>
</html>