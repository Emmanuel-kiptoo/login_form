
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and Registration system</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <h3 class="navbar-brand text-white">login and Registration system</h3>
        <div class="mr-auto"></div>
        <ul class="navbar-nav">
          <?php
          if (isset($_SESSION['Admin'])) {?>
             <li class="nav-item">
                <a href="#" class="nav-link"><?php echo $_SESSION['Admin'];?></a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">logout</a>
            </li>
          <?php }else if (isset($_SESSION['User'])) {?>
            <li class="nav-item">
                <a href="index.php" class="nav-link"><?php echo $_SESSION['User'];?></a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">logout</a>
            </li>
          <?php }else{ ?>
            <li class="nav-item">
                <a href="index.php" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="register.php" class="nav-link">Register</a>
            </li>

          <?php }
           ?>
            
        </ul>


    </nav> 
</body>
</html>