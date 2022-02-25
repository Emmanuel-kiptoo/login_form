<?php
session_start();

if(isset($_SESSION['Admin'])){
    unset($_SESSION['Admin']);
    header("Location: index.php");
}else if(isset($_SESSION['User'])){
    unset($_SESSION['User']);
    header("Location: index.php");
}

?>