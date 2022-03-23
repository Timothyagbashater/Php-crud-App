
 <?php

use LDAP\Result;

 include 'connect.php';
$mail = "";
if(isset($_POST["login"]))
    
    {   
        // if($_SERVER['REQUEST_METHOD'] == 'Post'){
        // $email = filter_input(INPUT_POST, 'email');
        // $password = filter_input(INPUT_POST, 'password');
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo "Email from form".$email;
        echo "password from form".$password;
        // if(empty($email)|| empty($password)){
        //     header('location:login.php');
        //     echo 'div class="alert alert-danger">All fields are required</div>';
        
        // }
        //echo "$email, $password"; 


        if(!isset($_POST['email']) || strlen(trim($_POST['email']))==0){
            $email_error[]='invalid or missing email';
          }
          if(!isset($_POST['password']) || strlen(trim($_POST['password']))==0){
            $password_error[]='invalid or missing password';
          }

          
        
        
    // }   
       
        // Query the database

        
        $result1 = $conn->query("SELECT email,password FROM crud WHERE email = '$email'");
        // var_dump($result1);
        $data = $result1->fetch_assoc();
        echo $data['password'];
        //check the number of rows
        if($result1 -> num_rows > 0 )
        { 

            $myhash = password_hash($password, PASSWORD_DEFAULT);
            echo "Hashed value".$myhash;
            //fetch the data from database
            // while($row = $result1->fetch_assoc())
            // {
            //     $hashed_password = $row['password'];
            // }
            // $hgm = password_verify($password, $hashed_password);
            //Compare the normal password with the hashed_password 
           if(($email = $data['email']) && ($myhash = $data['password']))
           {
            //    Login user 
            echo '<div class="alert alert-success">Login Successful!</div>';
            header('Refresh:0.5; URL= display.php');
           }
           else{
            //    Credentials do not match
            echo '<div class="alert alert-danger">Access not granted, credentials mismatch</div>';
           }
        } 
        else{
            //    Credentials do not match
            echo '<div class="alert alert-danger">Sorry Login Details not found!</div>';
           } 
        
    }   






// Initialize the session
//session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: display.php");
//     exit;
// }
 
// Include config file
//require_once "config.php";
 
// Define variables and initialize with empty values
// $email = $password = "";
// $email_err = $password_err = $login_err = "";
 
// // Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST"){
 
//     // Check if email is empty
//     if(empty(trim($_POST["email"]))){
//         $email_err = "Please enter email.";
//     } else{
//         $email = trim($_POST["email"]);
//     }
    
//     // Check if password is empty
//     if(empty(trim($_POST["password"]))){
//         $password_err = "Please enter your password.";
//     } else{
//         $password = trim($_POST["password"]);
//     }
    
//     // Validate credentials
//     if(empty($email_err) && empty($password_err)){
//         // Prepare a select statement
//         $sql = "SELECT  email, password FROM crud WHERE email = ?";
        
//         if($stmt = mysqli_prepare($conn, $sql)){
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "s", $param_email);
            
//             // Set parameters
//             $param_email = $email;
            
//             // Attempt to execute the prepared statement
//             if(mysqli_stmt_execute($stmt)){
//                 // Store result
//                 mysqli_stmt_store_result($stmt);
                
//                 // Check if email exists, if yes then verify password
//                 if(mysqli_stmt_num_rows($stmt) == 1){                    
//                     // Bind result variables
//                     mysqli_stmt_bind_result($stmt,  $email, $hashed_password);
//                     if(mysqli_stmt_fetch($stmt)){
//                         if(password_verify($password, $hashed_password)){
//                             // Password is correct, so start a new session
//                             session_start();
                            
//                             // Store data in session variables
//                             $_SESSION["loggedin"] = true;
//                             // $_SESSION["id"] = $id;
//                             $_SESSION["email"] = $email;                            
                            
//                             // Redirect user to welcome page
//                             echo '<div class="alert alert-success">Loggedin</div>';
//                             header("Refresh: 1; URL= display.php");
//                         } else{
//                             // Password is not valid, display a generic error message
//                             $login_err = "Invalid email or password.";
//                         }
//                     }
//                 } else{
//                     // email doesn't exist, display a generic error message
//                     $login_err = "Invalid email or password.";
//                 }
//             } else{
//                 echo '<div class="alert alert-danger">Loggedin</div>';
//             }

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//     }
    
//     // Close connection
//     mysqli_close($conn);
// }
?>
<?php 

    if(!isset($email)){
        $email = '';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>User Login</title>

</head>

<body>

    <div class="container my-5">
        <form method="post" style="margin: 200px 350px 0px 350px;" action="" <?php htmlspecialchars($_SERVER["PHP_SELF"]); ?> 

         <?php if(isset($auth_error)){ ?>
                    <p><?php echo $auth_error?></p>
                <?php }?>>
                
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($email) ?>">
                <?php if(isset($email_error)){ ?>
                    <p><?php echo $email_error?></p>
                <?php }?>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    <?php if(isset($password_error)){?>
                    <p><?php echo $password_error ?></p>
                    <?php }?>
            </div>
        
            <button type="submit" class="btn btn-primary" name="login" >Login</button>
            <!-- <button type="btn" class="btn btn-primary" style="float: right;">Register</button> -->
            <p style="float: right; ">Already have an account?<a href="user.php">Sign Up</a></p>

        </form>

    </div>

</body>

</html>