<?php
$page_title="Add Post";

include("partials/navbar.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Post</h1>

        <br><br>



        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Post">
                    </td>
                </tr>

                <tr>
                    <td>Content: </td>
                    <td>
                        <textarea name="content" cols="30" rows="5" placeholder="Content of the Post."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php 
                            $query="select * from categories";
                            $res=mysqli_query($conn,$query);
                            if($res && $res->num_rows>0){
                                while($cat=$res->fetch_assoc()){
                                    $id=$cat['id'];
                                    $title=$cat['title'];
                                    echo "<option value='$id'> $title</option>";
                                }
                            }else{
                                echo "<option value='0'>No Category Found</option>";
                            }
                            ?>                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Type: </td>
                    <td>
                        <input type="radio" name="type" value="photo"> Photo 
                        <input type="radio" name="type" value="video"> Video
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Post" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        


    </div>
</div>

<?php
if(isset($_POST["submit"])){
    $title=$_POST["title"];
    $content=$_POST["content"];
    $type=$_POST["type"];
    $categor=$_POST['category'];
    $imgtitle=str_replace(" ","_",$title);

    if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
        $name=$_FILES['image']['name'];
        $temp=$_FILES['image']['tmp_name'];
        $ext=explode(".",$name);
        $ext=end($ext);
        $image_name="../assets/images/posts/".$imgtitle.".".$ext;
        move_uploaded_file($temp,$image_name);
    }else{
        $image_name="../assets/images/art/art_1.png";
    }

    $query="insert into posts set title='$title',content='$content',type='$type',image_name='$image_name',cat_id='$categor'";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['post']="<h3 class='success'>Post added successfuly!</h3>";
        header("location:manage-post.php");
    }else{
        $_SESSION['post']="<h3 class='error'>Post not added, there is a problem!</h3>";
        header("location:post-post.php");
    }


}


include("partials/footer.php");?>
