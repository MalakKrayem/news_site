<?php include("partials/navbar.php");?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>

                <br><br>

                <div class="col-4 text-center">



                     <?php
                    $res=mysqli_query($conn, "select count(*) as count from categories");
                    $count= $res->fetch_assoc();
                    $count=$count['count']
                    ?>
                    <h1> <?php echo $count?></h1>
                    <br />

                    Categories
                </div>

                <div class="col-4 text-center">
                <?php
                    $res=mysqli_query($conn, "select count(*) as count from posts");
                    $count= $res->fetch_assoc();
                    $count=$count['count']
                    ?>

                    <h1><?php echo $count?></h1>
                    <br />
                    Posts
                </div>

                <div class="col-4 text-center">
                <?php
                    $res=mysqli_query($conn, "select count(*) as count from admins");
                    $count= $res->fetch_assoc();
                    $count=$count['count']
                    ?>


                    <h1><?php echo $count?></h1>
                    <br />
                    Admins
                </div>

            

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

        <?php include("partials/footer.php");?>
