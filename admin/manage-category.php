<?php

$page_title="Manage Category";

include("partials/navbar.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br>
        <br><br>
        <?php
        if(isset($_SESSION['category'])){
        echo $_SESSION['category'];
        unset($_SESSION['category']);
        }
        ?>
        <br><br>
        <!-- Button to Add Admin -->
        <a href="add-category.php" class="btn-primary">Add Category</a>
        <br><br>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>

            <?php
            $query="select * from categories";
            $res=mysqli_query($conn,$query);
            if($res && $res->num_rows>0){
                while($category=$res->fetch_assoc()){
                    $id=$category['id'];
                    $title= $category['title'];
                    ?>
            <tr>
                <td> <?php echo $id;?></td>
                <td> <?php echo $title;?></td>
                <td>
                    <a href="update-category.php?id=<?php echo $id;?>" class="btn-secondary">Update Category</a>
                    <a href="delete-category.php?id=<?php echo $id;?>" class="btn-danger">Delete Category</a>
                </td>
            </tr>
            <?php
                }

            }else{
                echo " <tr><td colspan='6'><div class='error'>No Category Added.</div></td></tr>";
            }

           ?>


        </table>
    </div>

</div>

<?php include("partials/footer.php");?>
