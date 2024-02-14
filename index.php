<?php include('partials-front/menu.php'); ?>


        <!-- content begin -->
        <div id="content" class="no-bottom no-top">

              <!-- revolution slider begin -->
              <section id="section-slider" class="fullwidthbanner-container" aria-label="section-slider">
                <div id="revolution-slider">

                    <ul>
                        <?php 
                         //get all data
                         //Create sql to get all the details from database
                            $sql5 ="SELECT * FROM tbl_coverpage"; 
                            //Execute sql query
                            $res5=mysqli_query($conn, $sql5);
                            //Count rows
                            $count5=mysqli_num_rows($res5);

                            if($count5>0)
                            {
                                //we have data 
                                while($row5=mysqli_fetch_assoc($res5))
                                {
                                     //get individual data
                                        $id = $row5['id'];
                                        $title =$row5['title'];
                                        $description =$row5['description'];
                                        $image_name=$row5['image_name'];
                                        $active =$row5['active'];

                                        ?>

                            <li data-transition="fade" data-slotamount="10" data-masterspeed="default" data-thumb="">
                            <!--  BACKGROUND IMAGE -->
                            <?php 
                                     //Checking if image is available or not
                                       if($image_name=="")
                                       {
                                        //Image is not available
                                        echo "<div class='error'>No Image Found..</div>";
                                       }
                                       else{
                                        //Image is available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/slider-images/<?php echo $image_name; ?>"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" />
                                        <?php

                                       }
                                    ?>
                            <div class="tp-caption very-big-white"
                                data-x="0"
                                data-y="270"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-transform_in="x:50px;opacity:0;s:1000;e:Power3.easeOut;"
                                data-transform_out="opacity:0;x:-10;px;s:800;e:Power3.easeInOut;"
                                data-start="700"
                                data-splitin="none"
                                data-splitout="none"
                                data-responsive_offset="on"><?php echo $title; ?><span class="id-color">.</span>
                            </div>

                            <div class="tp-caption"
                                data-x="0"
                                data-y="330"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-transform_in="y:100px;opacity:0;s:500;e:Power3.easeOut;"
                                data-transform_out="opacity:0;x:-10;s:800;e:Power3.easeInOut;"
                                data-start="1100" style="size: 10px;"> <?php echo $description; ?>

                            </div>

                            <div class="tp-caption"
                                data-x="0"
                                data-y="420"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-transform_in="y:100px;opacity:0;s:500;e:Power3.easeOut;"
                                data-transform_out="opacity:0;x:-10;s:800;e:Power3.easeInOut;"
                                data-start="1200">
                                <a href="#" class="btn-slider">Contact Us
                                </a>
                            </div>
                        </li>
                                <?php
                                }    
                            }
                            else
                            {
                                //we dont have data
                                echo "<div class='error'>No Cover Page FOund....</div>";
                            }
                      
                        ?>

                    </ul>
                </div>
            </section>
            <!-- revolution slider close -->

            

            <!-- section begin -->
            <section id="section-about">
                <div class="container">
                    <div class="row">

                    <?php 
                    //Create sql to  display all the categories from database
                     $sql = "SELECT * FROM tbl_category WHERE active='YES' AND featured='Yes' ORDER BY id DESC LIMIT 3";
                     //Execute the qury
                     $res=mysqli_query($conn, $sql);
                     //Count the rows
                     $count = mysqli_num_rows($res);

                     if($count>0)
                     {
                        //We have data in db
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //We get the values like id, title, images name, description
                            $id =$row['id'];
                            $title =$row['title'];
                            $image_name = $row['image_name'];
                            $description =$row['description'];

                           ?> 
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                                <figure class="pic-hover hover-scale mb20">
                                    <span class="center-xy">
                                        <a class="image-popup" href="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>">
                                            <i class="fa fa-image btn-action btn-action-hide"></i></a>
                                    </span>
                                    <span class="bg-overlay"></span>

                                    <?php 
                                    //We are checking if image is available or not...
                                     if($image_name=="")
                                     {
                                        //display the message
                                        echo "<div class='error'>Images Not Available..</div>";
                                     }
                                     else{
                                        //iamge name available, display image
                                        ?>
                                         <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive" alt="Category">

                                        <?php
                                     }
                                    ?>
                                   
                                </figure>
                                <h3><?php echo $title; ?></h3>
                                <p style="text-align:justify">
                                    <?php echo $description; ?>
                                 <br>
                                    <a href="<?php echo SITEURL; ?>service-2.php?category_id=<?php echo $id; ?>" class="read_more mt10">read more <i class="fa fa-chevron-right id-color"></i></a>
                                </p>
                            </div>

                            <?php
                          }
                     }
                     else{
                        //we dont have data in database
                        echo "<div class='error'>Category Not Found...</div>";
                     }

                    
                    ?>



                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-features" class="text-light no-padding" data-stellar-background-ratio=".2">
                <div class="color-overlay pt80 pb80">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Why Choose Us<span class="tiny-border"></span></h2>
                            </div>

                            <div class="spacer-single"></div>


                            <!-- feature box begin -->
                            <div class="feature-box-small-icon col-md-4 wow fadeIn" data-wow-delay="0">
                                <div class="inner">
                                    <span class="icon wow fadeIn" data-wow-delay=".4s"><i class="icon_box-checked"></i></span>
                                    <div class="text">
                                        <h3>Commitment To Quality</h3>
                                         <p style="text-align:justify; ">Because we're easy to work with. We take the work seriously, our team ensures high Quality of work as the final product to our customers</p>
                                    </div>
                                </div>
                            </div>
                            <!-- feature box close -->

                            <!-- feature box begin -->
                            <div class="feature-box-small-icon col-md-4 wow fadeIn" data-wow-delay=".2s">
                                <div class="inner">
                                    <span class="icon wow fadeIn" data-wow-delay=".4s"><i class="icon_box-checked"></i></span>
                                    <div class="text">
                                        <h3>Happy Customers</h3>
                                         <p style="text-align:justify; ">Because we'll understand your brand. Before we even start, we look at your specifications on how you want the brand to look.
                                       </p> 
                                         </div>
                                </div>
                            </div>
                            <!-- feature box close -->

                            <!-- feature box begin -->
                            <div class="feature-box-small-icon col-md-4 wow fadeIn" data-wow-delay=".4s">
                                <div class="inner">
                                    <span class="icon wow fadeIn" data-wow-delay=".4s"><i class="icon_box-checked"></i></span>
                                    <div class="text">
                                        <h3>24/7 Open For Business</h3>
                                        <p style="text-align:justify; ">We are Futuristic, We are Approachable, We are Positive Minded, We are well-Timed, We are Zealous, We are Agreeable.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- feature box close -->
                            <div class="spacer-single"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-portfolio" class="no-bottom" aria-label="section-portfolio">
                <div class="container">
                    <h2>Recent Works<span class="tiny-border"></span></h2>
                </div>
                <div id="gallery" class="gallery invert full-gallery de-gallery pf_full_width">
                
                <?php 
                 //Create Sql to get all the data from database
                 $sql2="SELECT * FROM tbl_Service ORDER BY id DESC LIMIT 12";
                 //Execuite the query
                 $res2=mysqli_query($conn,$sql2);
                 //count the rows
                 $count2 =mysqli_num_rows($res2);

                 if($count2>0)
                 {
                    //We have data
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        //get individual data from db
                        $id =$row2['id'];
                        $title =$row2['title'];
                        $image_name =$row2['image_name'];

                        ?>  
                            <!-- gallery item -->
                            <div class="item residential">
                                <div class="picframe">
                                
                                    <a class="image-popup" href="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>">
                                    <i class="fa fa-image btn-action btn-action-hide"></i>
                                        <span class="overlay">
                                            <span class="pf_text">
                                                <span class="project-name"><?php echo $title; ?></span>
                                            </span>
                                        </span>
                                    </a>
                                    <?php 
                                     //Checking if images is available or not
                                      if($image_name=="")
                                      {
                                        //image is not available
                                        echo "<div class='error'>Images Not Available..</div>";
                                      }
                                      else{
                                        //image available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" alt="Services" />

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
                    //we do not have data
                     echo "<div class='error'>Category Not Found...</div>";
                 }
                ?>
             </div>

            </section>
            <!-- section close -->
            <br>

            <!-- section begin -->
            <section id="section-fun-facts" class="bg-color no-top no-bottom">
                <div class="pt10 pb10">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-3 wow fadeIn" data-wow-delay="0">
                                <div class="de_count">
                                    <h3 class="timer" data-to="7" data-speed="2500">0</h3>
                                    <span>Working Days</span>
                                </div>
                            </div>

                            <div class="col-md-3 wow fadeIn" data-wow-delay=".25s">
                                <div class="de_count">
                                    <h3 class="timer" data-to="32" data-speed="2500">0</h3>
                                    <span>Projects Completed</span>
                                </div>
                            </div>

                            <div class="col-md-3 wow fadeIn" data-wow-delay=".5s">
                                <div class="de_count">
                                    <h3 class="timer" data-to="32" data-speed="2500">0</h3>
                                    <span>Satisfied Clients</span>
                                </div>
                            </div>

                            <div class="col-md-3 wow fadeIn" data-wow-delay=".75s">
                                <div class="de_count">
                                    <h3 class="timer" data-to="7" data-speed="2500">0</h3>
                                    <span>on going projects</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-deco-1" class="text-light no-top no-bottom" data-bgcolor="#333" data-stellar-background-ratio=".2">
                <div class="color-overlay pt80 pb60">
                    <div class="container">
                        <div class="row">
                            <?php 
                             //Create SQL query to get all the details from database
                             $sql3="SELECT * FROM tbl_about_history LIMIT 1";
                             //Excute the query
                             $res3=mysqli_query($conn, $sql3);
                             //Count number of rows
                             $count3 =mysqli_num_rows($res3);

                             if($count3>0)
                             {
                                //We have data in db
                                while($row3=mysqli_fetch_assoc($res3))
                                {
                                    //get individual data from db
                                    $id = $row3['id'];
                                    $vision = $row3['vision'];
                                    $misssion = $row3['mission'];
                                    $image_name =$row3['image_name'];
                                    
                                    ?>

                                     <div class="col-md-6">
                                        <h2>We Offer <span class="id-color">Branding, Graphic </span> Website Design<span class="tiny-border"></span></h2>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3>Our Vision</h3>
                                                <p style="text-align:justify; "><?php echo $vision; ?></p>
                                                <a href="about.html" class="read_more">read more <i class="fa fa-chevron-right id-color"></i></a>
                                            </div>

                                            <div class="col-md-6">
                                                <h3>Our Mission</h3>
                                                <p style="text-align:justify; "><?php echo $misssion; ?></p>
                                                <a href="about.html" class="read_more">read more <i class="fa fa-chevron-right id-color"></i></a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <figure class="pic-hover hover-scale mb30">
                                            <span class="center-xy">
                                            <a class="image-popup" href="<?php echo SITEURL; ?>images/about/<?php echo $image_name; ?>">
                                            <i class="fa fa-image btn-action btn-action-hide"></i></a>
                                            </span>
                                            <span class="bg-overlay"></span>
                                            <?php 
                                             //checking if image is available or not
                                              if($image_name=="")
                                              {
                                                //we do not have image
                                                echo"<div class='error'>Image Not Available..</div>";
                                              }
                                              else{
                                                //image is available
                                                ?>
                                                 <img src="<?php echo SITEURL; ?>images/about/<?php echo $image_name; ?>" class="img-responsive" alt="">

                                                <?php
                                              }
                                            ?>
                                           
                                        </figure>
                                    </div>
                                 <?php
                                }
                             }
                             else{
                                //we dont have data in db
                                echo "<div class='error'>About Us Information Not Found...</div>";
                             }
                            
                            ?>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->


            <!-- section begin -->
            <section id="section-team">
                <div class="container">
                    <div class="row wow fadeInUp">
                    <div class="col-md-12">
                            <h2>Our Team<span class="tiny-border"></span></h2>
                        </div>

                        <?php 
                         //Create SQL to get all the team member details
                         $sql4="SELECT * FROM tbl_team ORDER BY id DESC LIMIT 4";
                         //Execute the query
                         $res4=mysqli_query($conn,$sql4);
                         //count rows
                         $count4=mysqli_num_rows($res4);

                         if($count4>0)
                         {
                            //we have data
                            while($row4=mysqli_fetch_assoc($res4))
                            {
                                //get indivual data
                                $id = $row4['id'];
                                $name = $row4['name'];
                                $position = $row4['position'];
                                $image_name =$row4['image_name'];

                                ?>
                                <div class="col-md-3">
                                    <div class="profile_pic">
                                        <?php 
                                         if($image_name=="")
                                         {
                                            echo "No Image";
                                         }
                                         else{
                                            ?>
                                             <figure class="pic-hover hover-scale mb30">
                                            <img src="<?php echo SITEURL; ?>images/employees/<?php echo $image_name;?>" class="img-responsive">
                                        </figure>

                                            <?php
                                         }
                                        ?>
                                       
                                        <h3><?php echo $name; ?></h3>
                                        <span class="subtitle"><?php echo $position; ?></span>
                                        <span class="tiny-border"></span>
                                    </div>
                                </div>

                                <?php
                            }
                         }
                         else{
                            //we dont have data
                            echo "<div class='error'>No Team Member Found...</div>";
                         }
                        ?>
                    </div>
                </div>
            </section>
            <!-- section close -->

<!-- section begin -->
            <section class="call-to-action bg-color dark pt20 pb20" data-speed="5" data-type="background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="mt10">Looking for best partner for your next Business Project?</h3>
                        </div>

                        <div class="col-md-4 text-right">
                            <a href="contact.php" class="btn btn-line-black btn-fx">Hire Us Now</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

        </div>

<?php include('partials-front/footer.php'); ?>