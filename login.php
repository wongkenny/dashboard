<?php
include_once 'config/database.php';
session_start();
$con=dbconnect();

$username=$_POST['user_login'];
$password=sha1($_POST['user_password']);

if(isset($username) && isset($password)){
    $sql="select username from login where username ='$username' and password='$password' and account_type='administrator' limit 1";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $_SESSION['id']=$username;
         header("location:dashboard.php");
    }else{
        header("location:index.php?error="."invalid");
    }
}
