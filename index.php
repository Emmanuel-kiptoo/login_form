<?php
session_start();
include("config.php");

$output="";

if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $role=$_POST['role'];

    if(empty($email)){

    }else if(empty($role)){

    }else if(empty($pass)){

    }else{

        $query="SELECT * FROM users WHERE email='$email' AND role='$role' AND pass='$pass'";
        $res=mysqli_query($conn,$query);

        if (mysqli_num_rows($res)==1) {

            if ($role == "Admin"){
                $_SESSION['Admin']= $email;
                header("Location: Admin.php");
            }else if ($role == "User"){
                $_SESSION['User']= $email;
                header("Location: User.php");

            }
            $output .="You have logged in successfully";
         }else{
           die(mysqli_error($conn));
        }


    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login and Registration form</title>
    
</head>
<body>
<?php include("header.php");?>

<div class="container">
    <div class="col-md-12">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                <form method="post">
                    <h3 class="text-center my-3">Login Form</h3>
                    <div class="text-center"><?php echo $output; ?></div>
                    <label>Email</label>
                    <input type="text" name="email" class="form-control my-2" placeholder="Enter Email Address" autocomplete="off">
                    
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control my-2" placeholder="Enter Correct Password" autocomplete="off">

                    <label>Select Role</label>
                    <select name="role" class="form-control my-2">
                        <option value="">Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>

                    </select>

                    <input type="Submit" name="login" class="btn btn-success" value="Login">

                </form>
             </div>
        </div>
    </div>
</div>

</body>
</html>