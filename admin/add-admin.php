
<!-- Menu Section Starts -->
<?php
$page_title="Add Admin";

include("partials/navbar.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="first_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="last_name" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>
<?php 

if(isset($_POST["submit"])){
    $firstname=$_POST["first_name"];
    $lastname=$_POST["last_name"];
    $password=md5($_POST["password"]);

    $query="insert into admins set first_name='$firstname',last_name='$lastname',password='$password'";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['admin']="<h3 class='success'>Admin added successfuly!</h3>";
        header("location:manage-admin.php");
    }else{
        $_SESSION['admin']="<h3 class='error'>Admin not added, there is a problem!</h3>";
        header("location:manage-admin.php");
    }


}

include("partials/footer.php");?>


<!-- Footer Section Ends -->


