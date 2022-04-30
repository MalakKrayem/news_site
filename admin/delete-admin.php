<?php
$page_title="Delete Admin";

include("../config/constants.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="delete from admins where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['admin']="<h3 class='success'>Admin deleted successfuly!</h3>";
        header("location:manage-admin.php");
    }else{
        $_SESSION['admin']="<h3 class='error'>Admin not added, there is a problem!</h3>";
        header("location:manage-admin.php");
    }

}else{
    header("location:manage-admin.php");
}