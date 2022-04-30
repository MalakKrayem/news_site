<?php
include("../config/constants.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="delete from categories where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['category']="<h3 class='success'>Category deleted successfuly!</h3>";
        header("location:manage-category.php");
    }else{
        $_SESSION['category']="<h3 class='error'>Category not added, there is a problem!</h3>";
        header("location:manage-category.php");
    }

}else{
    header("location:manage-category.php");
}