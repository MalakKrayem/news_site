
<?php
$page_title="Update Admin";

include("partials/navbar.php");
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $query="select * from admins where id=$id";
    $res=mysqli_query($conn,$query);
    if($res && $res->num_rows>0){
        $admin=$res->fetch_assoc();
        $firstname=$admin["first_name"];
        $lastname=$admin["last_name"];   
    }else{
        header("location:manage-admin.php");
    }
}else{
    header("location:manage-admin.php");
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="first_name" value="<?php echo $firstname;?>">
                    </td>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="last_name" value="<?php echo $lastname;?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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

    $query="update  admins set first_name='$firstname',last_name='$lastname' where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['admin']="<h3 class='success'>Admin updated successfuly!</h3>";
        header("location:manage-admin.php");
    }else{
        $_SESSION['admin']="<h3 class='error'>Admin not updated, there is a problem!</h3>";
        header("location:manage-admin.php");
    }


}

include("partials/footer.php");?>

<!-- Footer Section Ends -->
