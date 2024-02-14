<?php include('partials-front/menu.php'); ?>

<?php 
 //check if ID is passed or not
    if(isset($_GET['id']))
    {
        //category id is set and get the id
        $id = $_GET['id'];

        //get the category title based on category id
        $sql3 ="SELECT title FROM tbl_service WHERE id=$id";

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
                    //check whether id is set or not
                    if(isset($_GET['id']))
                    {
                        //get all details
                        $id= $_GET['id'];

                        //SQL query to get the selected services
                        $sql = "SELECT * FROM tbl_service WHERE id=$id";
                        //Execute the query
                        $res= mysqli_query($conn,$sql);

                        //get the value based on query execution
                        $row = mysqli_fetch_assoc($res);

                        //get individual values of selected services
                        $title =$row['title'];
                        $description =$row['description'];
                        $image_name =$row['image_name'];
                        ?>
                         <div class="col-md-9">
                        <div class="row"> 

                            <div class="col-md-6 pic-services">
                                <?php 
                                 //Checkif image is available or not
                                   if($image_name=="")
                                   {
                                    //image does not exist
                                    echo "<div class='error'> No Image Available..</div>";
                                   }
                                   else{
                                    //image available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>">
                                    <?php
                                   }
                                ?>
                            </div>
                        </div>
                     <?php
                    } 
                 ?>
                <div class="spacer-single"></div>
                    <p style="text-align:justify; "><?php echo $description; ?></p>
                    <br>
                        

                        <h3>Related Projects<span class="tiny-border"></span></h3>
                        <div class="spacer-half"></div>
                        <div id="gallery" class="gallery full-gallery de-gallery pf_full_width">

                        <?php 
                         //sql to get all details
                         $sql2="SELECT * FROM tbl_service ORDER BY id DESC LIMIT 4";
                         //Execute query
                         $res2=mysqli_query($conn,$sql2);
                         //count rowa
                         $count2=mysqli_num_rows($res2);

                          if($count2>0)
                          {
                            //wehave data
                            while($row2=mysqli_fetch_assoc($res2))
                            {
                                //get all data
                                $title = $row2['title'];
                                $image_name =$row2['image_name'];

                                ?>
                                <!-- gallery item -->
                                <div class="item office commercial">
                                    <div class="picframe">
                                        <a href="#">
                                            <span class="overlay">
                                                <span class="pf_text">
                                                    <span class="project-name"><?php echo $title; ?></span>
                                                </span>
                                            </span>
                                        </a>
                                        <?php 
                                         //checking if image is available or not
                                           if($image_name=="")
                                           {
                                            //we dont have image 
                                            echo "<div class='error'>No Image Found..</div>";
                                           }
                                           else{
                                            //we have images
                                              ?>
                                               <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>"  />
                                              <?php
                                           }
                                        ?>
                                       
                                    </div>
                                </div>
                                <!-- close gallery item -->

                                <?php

                            }
                          }
                          else{
                            //we dont have data
                            echo "<div class'error'>No Infrmation Found..</div>";
                          }
                        ?>

                        </div>

                    </div>

                    <div id="sidebar" class="col-md-3">
                        <div class="widget">
                            <div class="widget">
                            <ul id="services-list">
                                <li class="active"><a href="service-1.html">Graphic Design</a></li>
                                <li><a href="service-2.html">Website Design</a></li>
                                <li><a href="service-3.html">Branding</a></li>
                            </ul>
                        </div>
                        </div>

                        <div class="widget">
                            <div class="padding30 text-black" data-bgimage="url(images/background/banner-1.jpg)">
                                <h4>Attention!</h4>
                                 Looking for best partner for your next business branding? Umoyo Printex is at your service.
								<div class="text-center">
                                    <a href="contact.php" class="btn btn-line-black btn-fx mt20">Hire Us Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <a href="#" class="btn btn-custom btn-bg-dark btn-text-light btn-icon-left btn-fx width100"><i class="fa fa-file-pdf-o"></i>Business Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <!-- footer begin -->    
<?php include('partials-front/footer.php'); ?>