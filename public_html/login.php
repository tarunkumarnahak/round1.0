<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home2.php");
    exit;
}
 
// Include config file
require_once "dbconfig.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                          //  session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: home2.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" media="screen" href="css/style.css">
  <link rel="stylesheet" media="screen" href="css/style2.css">
  
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>

<div id="particles-js"></div>

<script src="particles.js"></script>
<script src="js/app.js"></script>

</head>
<body>
    <div class="">
        <form class="boxy" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2 style="color:white;" id="head">Login</h2></br>
       
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
               <!-- <label>Username</label>-->
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="UserID">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
               <!-- <label>Password</label>-->
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
</br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
         <!--  <<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>-->
        </form>
    </div>    
</body>
</html>
<!--<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php// if(!empty($message)): ?>
    <p><?= $message ?></p>
  <?php //endif; ?>

  <title>Quiz</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="Vincent Garreau" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="css/style.css">
  </head>
<body>


<div id="particles-js"></div>

<script src="particles.js"></script>
<script src="js/app.js"></script>

<body >
</div>
<form class="boxy" action="dbconfig.php" method="post">
  </form>
	
<form class="box" action="login.php" method="post">
	<h1>Start Round  </h1>
	<input type="email" name="email" placeholder="Email Address"> 
<input type="password" name="team" placeholder="password">
  
	<input type="submit" id="btn" value="login" name="reg_user">
</form>

</body>
</body>
</html>
-->