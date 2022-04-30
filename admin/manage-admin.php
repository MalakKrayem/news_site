
<!-- Menu Section Starts -->
<?php
$page_title="Manage Admin";

include("partials/navbar.php");?>


<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <br/>

        <?php
        if(isset($_SESSION['admin'])){
        echo $_SESSION['admin'];
        unset($_SESSION['admin']);
        }
        ?>

        <br><br><br>

        <!-- Button to Add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br/><br/><br/>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>


            <?php
            $query="select * from admins";
            $res=mysqli_query($conn,$query);
            if($res && $res->num_rows>0){
                while($admin=$res->fetch_assoc()){
                    $id=$admin['id'];
                    $firstname= $admin['first_name'];
                    $lastname=$admin['last_name'];
                    ?>
                     <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $firstname;?></td>
                <td><?php echo$lastname; ?></td>
                <td>
                    <a href="update-admin.php?id=<?php echo $id;?>" class="btn-secondary"> update </a> &nbsp;
                    <a href="delete-admin.php?id=<?php echo $id;?>" class="btn-danger"> delete </a>&nbsp;
                    <a href="update-password.php?id=<?php echo $id;?>" class="btn-primary"> change password </a>&nbsp;

                </td>
            </tr>

                    <?php
                }

            }else{
                echo "<tr><td><p class='error'> no admin yet ! </p></td></tr>";
            }
            
            ?>

           
           

        </table>

    </div>
</div>
<!-- Main Content Setion Ends -->

<?php include("partials/footer.php");?>

<!-- Footer Section Ends -->
