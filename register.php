<?php

include("config.php");

$output ="";
if(isset($_POST['register'])){
    $fname=$_POST['fname'];
    $sname=$_POST['sname'];
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $phone_number=$_POST['phone_number'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $role=$_POST['role'];

    $error=array();

    if(empty($fname)){
        $error['error']= "Please input your firstname";
     }else if(empty($sname)){
        $error['error']= "Please input your surname";
    }else if(empty($uname)){
        $error['error']= "Please input your username";
    }else if(empty($pass)){
        $error['error']= "Please input your password";
    }else if(empty($cpass)){
        $error['error']= "Please confirm your password";
    }else if($pass != $cpass){
        $error['error']= "Both password do not match";
    }  else if(empty($phone_number)){
        $error['error']= "Please input your phone_number";
    }else if(empty($email)){
        $error['error']= "Please input your email"; 
    }else if(empty($gender)){
        $error['error']= "Please select your gender";
    }else if(empty( $role)){
        $error['error']= "Please select your role";

    }


    if(isset($error['error'])){
        $output .= $error['error'];
    }else {
        $output .="";
    }

    if(count($error) < 1){

        $query= "INSERT INTO users (fname, sname,uname,pass,phone_number, email, gender, role) VALUES ('$fname','$sname','$uname','$pass','$phone_number','$email','$gender','$role')";
        $res= mysqli_query($conn,$query);

        if($res){
            $output .="You have successfully registered";
            header("Location: index.php");
        }else{
            $output .="Failed to register";
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
                    <h3 class="text-center my-3">Register Form</h3>
                    <div class="text-center"><?php echo $output; ?></div>
                    <label>First name</label>
                    <input type="text" name="fname" class="form-control my-2" placeholder="Enter your firstname" autocomplete="off">
                    
                    <label>Surname</label>
                    <input type="text" name="sname" class="form-control my-2" placeholder="Enter your surname" autocomplete="off" >
                    
                    <label>Username</label>
                    <input type="text" name="uname" class="form-control my-2" placeholder="Enter your username" autocomplete="off">
                    
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control my-2" placeholder="Enter Correct Password" >

                    <label>Confirm password</label>
                    <input type="password" name="cpass" class="form-control my-2" placeholder="Confirm your Password">

                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control my-2" placeholder="Enter your phone number"autocomplete="off" >
                    
                    <label>Email</label>
                    <input type="text" name="email" class="form-control my-2" placeholder="Enter Email Address"autocomplete="off" >
                    
                    
                    <label>Select Gender</label>
                    <select name="gender" class="form-control my-2">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label>Select Role</label>
                    <select name="role" class="form-control my-2">
                        <option value="">Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>

                    <input type="submit" name="register" class="btn btn-success" value="Register">

                </form>
             </div>
        </div>
    </div>
</div>
<div class="" style="margin-top:30px;"></div>


</body>
</html>