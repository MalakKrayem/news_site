<?php
$page_title="Update Category";

include("partials/navbar.php");
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $query="select * from categories where id=$id";
    $res=mysqli_query($conn,$query);
    if($res && $res->num_rows>0){
        $cat=$res->fetch_assoc();
        $title=$cat["title"];
    }else{
        header("location:manage-category.php");
    }

}else{
    header("location:manage-category.php");

}


?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>


        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>
<?php
if(isset($_POST["submit"])){
    $title=$_POST["title"];

    $query="update  categories set title='$title' where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['category']="<h3 class='success'>Category updated successfuly!</h3>";
        header("location:manage-category.php");
    }else{
        $_SESSION['category']="<h3 class='error'>Category not updated, there is a problem!</h3>";
        header("location:manage-category.php");
    }


}



include("partials/footer.php");?>
