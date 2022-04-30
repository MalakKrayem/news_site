<?php
include "../config/constants.php";
?>
<html>
    <head>
        <title>Login - Worl time news site</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
            <?php
            if(isset($_SESSION['login_faild'])){
            echo $_SESSION['login_faild'];
            unset($_SESSION['login_faild']);

            }
            ?>

            <br><br>

            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->

        </div>

        <?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql="select * from admins where first_name='$username' and password='$password'";
    $res=mysqli_query($conn,$sql);
    if($res && $res->num_rows>0){
        $_SESSION['login']=$username;
        header("location:index.php");
    }else{
        $_SESSION['login_faild'] ="<h5 class='error'>username or password is in correct</h5>";
    }

}
include "partials/footer.php";

