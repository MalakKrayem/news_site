<?php
$page_title="Delete Post";

include("../config/constants.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="delete from posts where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['post']="<h3 class='success'>Post deleted successfuly!</h3>";
        header("location:manage-post.php");
    }else{
        $_SESSION['post']="<h3 class='error'>Post not added, there is a problem!</h3>";
        header("location:manage-post.php");
    }

}else{
    header("location:manage-post.php");
}