<?php
$page_title="Manage post";

include("partials/navbar.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Post</h1>

        <br/><br/>
        <?php
        if(isset($_SESSION['post'])){
        echo $_SESSION['post'];
        unset($_SESSION['post']);
        }
        ?>
<br/><br/><br/><br/>
        <!-- Button to Add Admin -->
        <a href="add-post.php" class="btn-primary">Add Post</a>

        <br/><br/><br/>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Publication time</th>
                <th>Type</th>
                <th>Actions</th>
                
            </tr>

            <?php
            $query="select * from posts";
            $res=mysqli_query($conn,$query);
            if($res && $res->num_rows>0){
                while($post=$res->fetch_assoc()){
                    $id=$post['id'];
                    $title= $post['title'];
                    $image=$post['image_name'];
                    $type= $post['type'];
                    $Publication_time=$post['Publication time'];
                    ?>

            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $title;?></td>
                <td><img src="<?php echo $image;?>" alt="post" width="50" height="50"></td>
                <td><?php echo $Publication_time;?></td>
                <td><?php echo $type;?></td>
                <td>
                    <a href="update-post.php?id=<?php echo $id;?>" class="btn-secondary">Update Post</a>
                    <a href="delete-post.php?id=<?php echo $id;?>" class="btn-danger">Delete Post</a>
                </td>
            </tr>
            <?php
                }

            }else{
                echo "<tr><td><p class='error'> no posts yet ! </p></td></tr>";
            }
            
            ?>

        </table>
    </div>

</div>

<?php include("partials/footer.php");?>
