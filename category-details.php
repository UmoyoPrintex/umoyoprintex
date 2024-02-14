<?php include('partials-front/menu.php'); ?>

<?php 
 //check if ID is passed or not
    if(isset($_GET['id']))
    {
        //category id is set and get the id
        $id = $_GET['id'];

        //get the category title based on category id
        $sql3 ="SELECT title FROM tbl_category WHERE id=$id";

        //excute the query
        $res3=mysqli_query($conn, $sql3);

        //get the value from database
        $row3=mysqli_fetch_assoc($res3);
        //get the title
        $title =$row3['title'];

    }
    else{
        //category id is not passed direct to home page
        header('location:'.SITEURL);
    }
 ?>

        <!-- subheader -->
        <section id="subheader" data-stellar-background-ratio=".3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo $title; ?></h1>
                        <div class="small-border-deco"><span></span></div>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep"></li>
                            <li><?php echo $title; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <?php 
                     //Get all the data from database
                     if(isset($_GET['id']))
                     {
                        $id= $_GET['id'];

                        //SQL query to get the selected services
                        $sql = "SELECT * FROM tbl_category WHERE id=$id";
                        //Execute the query
                        $res= mysqli_query($conn,$sql);

                        //get the value based on query execution
                        $row = mysqli_fetch_assoc($res);

                         //get individual values of selected services
                         $title =$row['title'];
                         $description =$row['description'];
                         $image_name =$row['image_name'];

                         ?>
                          <div class="col-md-6">
                            <div class="padding40" data-bgcolor="#f5f5f5">
                                <h3 class="mb20">Project Details
                                    <span class="tiny-border"></span>
                                </h3>

                                <div class="info-details">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info-text">
                                                <span class="title">Title:</span>
                                                <span class="val"><?php echo $title; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="spacer-single"></div>
                                <h3 class="mb20">Project Overview
                                    <span class="tiny-border"></span>
                                </h3>
                                <p style="text-align:justify; ">
                                    <?php echo $description; ?>
                                  </p>

                            </div>
                            </div>
                            <div class="col-md-6">
                            <div id="project-img-carousel" class="zoom-gallery">
                                <figure class="pic-hover hover-scale mb30">
                                    <a href="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>">
                                        <span class="center-xy">
                                            <i class="fa fa-search btn-action btn-action-hide"></i>
                                        </span>
                                        <span class="bg-overlay"></span>
                                        <?php 
                                         //Checking if image is available
                                           if($image_name=="")
                                           {
                                            //image not available
                                            echo "<div class='error'> Image Not Available..</div>";
                                           }
                                           else{
                                            //image is available
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive">

                                            <?php
                                           }
                                        ?>
                                        
                                    </a>
                                </figure>

                            </div>
                            </div>
                             <?php
                         }
                      ?>
                </div>
            </div>
         </div>

        <section class="pt40 pb30" data-bgcolor="#eee">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="de-arrow-nav-set">
                            <a href="project-details-3.html"><i class="arrow_left pull-left"></i></a>
                            <a href="projects.html"><i class="icon_menu"></i></a>
                            <a href="project-details-5.html"><i class="arrow_right pull-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- footer begin -->
       
<?php include('partials-front/footer.php'); ?>