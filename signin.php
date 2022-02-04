<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/signin.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/signin.js"></script>
</head>
<body>
  <!-- Defining the navigation menu -->
  <nav>
    <ul>
        <li class="selected"><a href="index.html">Home</a></li>
       
       
        <li><a href="contactus.html">Contact us</a></li>
        <li><a href="aboutus.html">About</a></li>
        <li><a href="signin.php" target="_blank">Log in &and; Register</a></li>
    </ul>
       
</nav>
  <!-- Login/Signup Form -->
  <div class="login-page">
    <div class="form">
        <form class="register-form">
            <input type="text" placeholder="Username"/>
            <input type="text" placeholder="Email"/>
            <input type="text" placeholder="Password"/>
            <button> Create </button>
            <p class="message"> Already Registered? <a href="#">Login</a></p>
        </form>

        <form class="login-form" method="post" action="signin.php">
            <?php include('errors.php'); ?>
            <input id="username" type="text" placeholder="Username" name="username">
            <input id="pass" type="password" placeholder="Password" name="password">
            <button id="login" type="submit" name="login_user">Login</button>
            <p class="message">Not Registered? <a href="register.php">Register</a></p>
            <br>
            <p id="rez"></p>
        </form>
    </div>
</div>
 <?php
        $connect=mysqli_connect('localhost','root','','projct');
            mysqli_select_db($connect,'project');
            
            if (isset($_POST['login_user'])) {
                $username = mysqli_real_escape_string($db, $_POST['username']);
                $password = mysqli_real_escape_string($db, $_POST['password']);

                if (empty($username)) {
  	                 array_push($errors, "Username is required");
                }
                if (empty($password)) {
  	                 array_push($errors, "Password is required");
                }
                if (count($errors) == 0) {
                    $password = md5($password);
                    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                    $results = mysqli_query($db, $query);
                    if (mysqli_num_rows($results) == 1) {
                        $_SESSION['username'] = $username;
                        $_SESSION['success'] = "You are now logged in";
                        header('location: order.php');
                    }else {
                        array_push($errors, "Wrong username/password combination");
                    }
                }
            }
               
        ?>
</body>
</html>
