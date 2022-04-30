
        <?php include("partials/_navbar.php");
        include("convertTime.php");
        ?>


        <!-- partial -->
        
        <div class="content-wrapper">
          <div class="container">
            <div class="row" data-aos="fade-up">
              <?php
              $query="select * from posts ORDER BY id DESC LIMIT 1";
              $res=mysqli_query($conn,$query);
              if($res && $res->num_rows>0){
                $post=$res->fetch_assoc();
                $title=$post['title'];
                $type=$post['type'];
                $pubtime=$post['Publication time'];
                $image=$post['image_name'];
                $image_name=trim($image,".\./");
                if($type=='ph'){
                  $wrtype="Photo";
                }

                $date=strtotime($pubtime);
                $dateiff=secondsToTime($date,time());

                
                    
              }
              
              ?>
              <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                  <img
                    src="<?php echo $image_name;?>"
                    alt="banner"
                    class="img-fluid"
                    
                  />
                  <div class="banner-content">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                      global news
                    </div>
                    <h1 class="mb-0">GLOBAL PANDEMIC</h1>
                    <h1 class="mb-2">
                      <?php echo $title;?>
                    </h1>
                    <div class="fs-12">
                      <span class="mr-2"><?php echo $wrtype;?> </span><?php echo $dateiff;?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Latest news</h2>
                    <?php
                     $query="select * from posts ORDER BY id DESC LIMIT 3";
                     $res=mysqli_query($conn,$query);
                     if($res && $res->num_rows>0){
                       while($post=$res->fetch_assoc()){
                        $title=$post['title'];
                        $type=$post['type'];
                        $pubtime=$post['Publication time'];
                        $image=$post['image_name'];
                        $image_name=trim($image,".\./");
                        $date=strtotime($pubtime);
                $dateiff=secondsToTime($date,time());
                        if($type=='ph'){$wrtype="Photo";}?>
                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                      <div class="pr-3">
                        <h5><?php echo $title;?></h5>
                        <div class="fs-12">
                          <span class="mr-2"><?php echo $wrtype;?> </span><?php echo $dateiff ;?>
                        </div>
                      </div>
                      <div class="rotate-img">
                        <img
                          src="<?php echo $image_name;?>"
                          alt="thumb"
                          class="img-fluid img-sm"
                        />
                      </div>
                    </div>
                        <?php
                       }
                     }else{                        
                      echo "<h3 style='color:red;'>No post yet...</h3>";
                      }
                    
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                      <?php
                      $query="select * from categories";
                      $res=mysqli_query($conn,$query);
                      if($res && $res->num_rows>0){
                        while($post=$res->fetch_assoc()){
                          $title=$post['title'];
                          $id=$post['id'];
                          echo "<li><a href='category_post.php?id=$id'>$title</a></li>";
                        }
                      }
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <?php
                    $query="select * from posts ORDER BY RAND() LIMIT 3";
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
                        <div class="position-relative">
                          <div class="rotate-img ">
                            <img
                              src="<?php echo $image_name;?>"
                              alt="thumb"
                              class="img-fluid "
                              width="200" height="200"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >Flash news</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <h2 class="mb-2 font-weight-600">
                          <?php echo $title;?>
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2"><?php echo $wrtype?> </span><?php echo $dateiff;?>
                        </div>
                        <p class="mb-0">
                          <?php echo $content;?>
                        </p>
                      </div>
                    </div>
                        <?php
                      }
                    }
                    
                    ?>
                    

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

      