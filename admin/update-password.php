
<?php
$page_title="Update Password";


include("partials/navbar.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $query="select password from admins where id=$id";
    $res=mysqli_query($conn,$query);
    if($res && $res->num_rows>0){
        $admin=$res->fetch_assoc();
        $old_password=$admin["password"];
    }else{
        header("location:manage-admin.php");
    }
}else{
    header("location:manage-admin.php");
}

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>


<?php
if(isset($_POST['submit'])){
    $curr_password=md5($_POST['current_password']);
    $new_password=$_POST["new_password"];
    $confirm_password=$_POST["confirm_password"];

    if($old_password==$curr_password){
        if($new_password==$confirm_password){
            $new_password=md5($new_password);
            $query="update  admins set password='$new_password' where id=$id";
            $res=mysqli_query($conn,$query);
            if($res){
                $_SESSION['admin']="<h3 class='success'>Password updated  successfuly!</h3>";
                header("location:manage-admin.php");
            }else{
                $_SESSION['admin']="<h3 class='error'>Password not updated , there is a problem!</h3>";
                header("location:manage-admin.php");
            }
        }else{
            echo "Passwords are not matched!";
        }
    }else{
        echo "Current password isn't correct!";
    }
}


include("partials/footer.php");?>

<!-- Footer Section Ends -->
