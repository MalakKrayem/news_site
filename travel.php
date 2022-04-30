
        <?php include("partials/_navbar.php");
                include("convertTime.php");

        ?>


        <!-- partial -->
        
        <div class="content-wrapper">
          <div class="container">
            <div class="col-sm-12">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <h1 class="font-weight-600 mb-4">
                        Politicals
                      </h1>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                    <?php
                      $query="select * from posts where cat_id=18 LIMIT 6";
                      $res=mysqli_query($conn,$query);
                      if($res && $res->num_rows>0){
                        while($post=$res->fetch_assoc()){
                          $title=$post['title'];
                          $content=$post['content'];
                          $type=$post['type'];
                          $pubtime=$post['Publication time'];
                          $image=$post['image_name'];
                          $image_name=trim($image,".\./");
                          if($type=='ph'){$wrtype="Photo"; }
  
                          $date=strtotime($pubtime);
                          $dateiff=secondsToTime($date,time());
                      
                      ?>
                      <div class="row">
                        <div class="col-sm-4 grid-margin">
                          <div class="rotate-img">
                            <img
                              src="<?php echo $image_name;?>"
                              alt="banner"
                              class="img-fluid"
                            />
                          </div>
                        </div>
                        <div class="col-sm-8 grid-margin">
                          <h2 class="font-weight-600 mb-2">
                          <?php echo $title;?>
                          </h2>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2">"<?php echo $wrtype;?> </span>"<?php echo $dateiff;?>
                          </p>
                          <p class="fs-15">
                          <?php echo $content;?>
                          </p>
                        </div>
                      </div>
                      <?php }}else{                        
                        echo "<h3 style='color:red;'>No post yet...</h3>";
                        }?>
            
                    </div>
                    <div class="col-lg-4">
                      <h2 class="mb-4 text-primary font-weight-600">
                        Latest news
                      </h2>
                      <?php
                      $query="select * from posts where cat_id=18 ORDER BY id DESC LIMIT 3";
                      $res=mysqli_query($conn,$query);
                      if($res && $res->num_rows>0){
                        while($post=$res->fetch_assoc()){
                          $title=$post['title'];
                          $type=$post['type'];
                          $pubtime=$post['Publication time'];
                          $image=$post['image_name'];
                          $image_name=trim($image,".\./");
                          if($type=='ph'){$wrtype="Photo"; }
  
                          $date=strtotime($pubtime);
                          $dateiff=secondsToTime($date,time());
                      
                      
                      ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="border-bottom pb-4 pt-4">
                            <div class="row">
                              <div class="col-sm-8">
                                <h5 class="font-weight-600 mb-1">
                                  <?php echo $title;?>
                                </h5>
                                <p class="fs-13 text-muted mb-0">
                                  <span class="mr-2"><?php echo $wrtype;?> </span><?php echo $dateiff;?>
                                </p>
                              </div>
                              <div class="col-sm-4">
                                <div class="rotate-img">
                                  <img
                                    src="<?php echo $image_name;?>"
                                    alt="banner"
                                    class="img-fluid"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php }}else{                        
                        echo "<h3 style='color:red;'>No post yet...</h3>";
                        }?>
                      
                      
                      
                      <div class="trending">
                        <h2 class="mb-4 text-primary font-weight-600">
                          Trending
                        </h2>

                        <?php
                      $query="select * from posts where cat_id=18 ORDER BY RAND()  LIMIT 3";
                      $res=mysqli_query($conn,$query);
                      if($res && $res->num_rows>0){
                        while($post=$res->fetch_assoc()){
                          $title=$post['title'];
                          $type=$post['type'];
                          $pubtime=$post['Publication time'];
                          $image=$post['image_name'];
                          $image_name=trim($image,".\./");
                          if($type=='ph'){$wrtype="Photo"; }
  
                          $date=strtotime($pubtime);
                          $dateiff=secondsToTime($date,time());
                      
                      
                      ?>
                      <div class="mb-4">
                          <div class="rotate-img">
                            <img
                              src="<?php echo $image_name;?>"
                              alt="banner"
                              class="img-fluid"
                            />
                          </div>
                          <h3 class="mt-3 font-weight-600">
                          <?php echo $title;?>
                          </h3>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2"><?php echo $wrtype;?> </span><?php echo $dateiff;?>
                          </p>
                        </div>
                      <?php }}else{                        
                        echo "<h3 style='color:red;'>No post yet...</h3>";
                        }
                      
                      ?>
                        
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <?php include("partials/_footer.php");?>

       