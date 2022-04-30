<?php
$page_title="Update Post";

include("partials/navbar.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $query="select * from posts where id=$id";
    $res=mysqli_query($conn,$query);
    if($res && $res->num_rows>0){
        $post=$res->fetch_assoc();
        $title=$post["title"];
        $content=$post["content"];
        $type=$post["type"];
        $image=$post["image_name"];
        $cat_id=$post["cat_id"];
    }else{
        header("location:manage-post.php");
    }
}else{
    header("location:manage-post.php");

}


?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Post</h1>
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
                    <td>Content:</td>
                    <td>
                        <textarea name="content" cols="30" rows="5"><?php echo $content;?></textarea>
                    </td>
                </tr>

                

                <tr>
                    <td>Current Image:</td>
                    <td>
                    <img src="<?php echo $image;?>" alt="post" width="50" height="50">
                    </td>
                </tr>

                <tr>
                    <td>Select New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
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
                    <td>Type:</td>
                    <td>
                        <input type="radio" name="type" value="photo" <?php echo( $type=="ph")? "checked":"";?>> photo
                        <input type="radio" name="type" value="video" <?php echo($type=="vi")? "checked":"";?>> video
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Update Post" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php
// if(isset($_POST["submit"])){
//     $newtitle=$_POST["title"];
//     $newcontent=$_POST['content'];
//     $newtype=$_POST['type'];
//     $newcat_id=$_POST['category'];

//     if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
//         $name=$_FILES['image']['name'];
//         $temp=$_FILES['image']['tmp_name'];
//         $ext=explode(".",$name);
//         $ext=end($ext);
//         $image_name="../assets/images/posts".$newtitle.".".$ext;
//         move_uploaded_file($temp,$image_name);
//     }else{
//         $image_name=$image;
//     }
//     $query="update  posts set title='$newtitle',content='$newcontent',type='$newtype',cat_id='$newcat_id',image_name='$image_name' where id=$id";

//     $res=mysqli_query($conn,$query);
//     if($res){
//         $_SESSION['post']="<h3 class='success'>Post updated successfuly!</h3>";
//         header("location:manage-post.php");
//     }else{
//         $_SESSION['post']="<h3 class='error'>Post not updated, there is a problem!</h3>";
//         header("location:manage-post.php");
//     }


// }

if(isset($_POST['submit'])){
    $newtitle=$_POST["title"];
    $newcontent=$_POST['content'];
    $newtype=$_POST['type'];
    $newcat_id=$_POST['category'];
    if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
        $name=$_FILES['image']['name'];
        $temp=$_FILES['image']['tmp_name'];
        $ext=explode(".",$name);
        $ext=end($ext);
        $image_name="../assets/images/posts/".$newtitle.".".$ext;
        echo $image_name;
        move_uploaded_file($temp,$image_name );
    }else{
        $image_name=$old_image_name;
    }

    $sql="update  posts set title='$title', content='$newcontent',
type='$newtype', image_name='$image_name',cat_id='$newcat' where id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION['post']= "<h3 class='success'> Post is updated  successfuly! </h3>";
        header("location:manage-post.php");
    }else{
        $_SESSION['post']= "<h3 class='error'> Post is not updated , there is a problem! </h3>";

        header("location:manage-post.php");


    }




}


include("partials/footer.php");?>
