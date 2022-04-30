<?php
$page_title="Add Category";

include("partials/navbar.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>



        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add CAtegory Form Ends -->


    </div>
</div>

<?php

if(isset($_POST["submit"])){
    $cat_title=$_POST["title"];
   

    $query="insert into categories set title='$cat_title'";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['category']="<h3 class='success'>Category added successfuly!</h3>";
        header("location:manage-category.php");
    }else{
        $_SESSION['admin']="<h3 class='error'>Category not added, there is a problem!</h3>";
        header("location:manage-category.php");
    }


}

include("partials/footer.php");?>
