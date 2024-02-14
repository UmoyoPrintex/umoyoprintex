<?php include('partials-front/menu.php'); ?>

        <!-- subheader -->
        <section id="subheader" data-stellar-background-ratio=".3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>About Us</h1>
                        <div class="small-border-deco"><span></span></div>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep"></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content" class="no-bottom">
            <div class="container">
                <div class="row">

                <?php 
                 //Create sql to get all data
                 $sql="SELECT * FROM tbl_about_history LIMIT 1";
                 //exccute query
                 $res=mysqli_query($conn, $sql);
                 //count rows
                 $count=mysqli_num_rows($res);

                 if($count>0)
                 {
                    //we have data
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get indivual data
                        $id = $row['id'];
                        $vision = $row['vision'];
                        $mission = $row['mission'];
                        $description = $row['description'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>

                         <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="padding30 mb30" data-bgcolor="#eee">
                                    <div class="box-icon-simple left">
                                        <i class="icon_comment_alt wow bounceIn id-color" data-wow-delay=".5s"></i>
                                        <div class="text">
                                            <h3>Our Vision</h3>
                                            <p style="text-align:justify; "><?php echo $vision; ?></p>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="padding30 mb30" data-bgcolor="#eee">
                                    <div class="box-icon-simple left">
                                        <i class="icon_clock_alt wow bounceIn id-color" data-wow-delay=".5s"></i>
                                        <div class="text">
                                            <h3>Our Mission</h3>
                                            <p style="text-align:justify; "><?php echo $mission; ?></p>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <figure class="pic-hover hover-scale mb20">
                                    <span class="center-xy">
                                        <a class="image-popup" href="<?php echo SITEURL; ?>images/about/<?php echo $image_name; ?>">
                                            <i class="fa fa-image btn-action btn-action-hide"></i></a>
                                    </span>
                                    <span class="bg-overlay"></span>
                                    <?php 
                                    //checking if image is available or not
                                    if($image_name=="")
                                    {
                                        //we dont have image
                                        echo "<div class='error'> No Image Found..</div>";
                                    }
                                    else
                                    {
                                        //image found
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/about/<?php echo $image_name; ?>" class="img-responsive" alt="">
                                        <?php
                                    }
                                    ?>
                                    
                                </figure>
                             </div>
                            
                            <div class="col-md-6">
                                
                                <p style="text-align:justify; "><?php echo $description; ?></p>
                                   </div>



                        <?php
                    }
                 }
                 else{
                    //we dont have data
                    echo "<div class='error'>No Information FOund..</div>";
                 }
                ?>

                   


                        </div>
                    </div>


                    <aside id="sidebar" class="col-md-3">
                        <div class="widget">
                            <ul id="services-list">
                                <li class="active"><a href="about.html">Company Overview</a></li>
                                <li><a href="about-history.html">Company History</a></li>
                                <li><a href="about-team.html">Our Team</a></li>
                            </ul>
                        </div>

                        <div class="widget">
                            <div class="padding30 text-black" data-bgimage="url(images/background/banner-1.jpg)">
                                <h4>Attention!</h4>
                                Looking for best partner for your next Business Project? Sed ut perspiciatis unde omnis iste natus error sit voluptatem.
								<div class="text-center">
                                    <a href="contact.html" class="btn btn-line-black btn-fx mt20">Hire Us Now</a>
                                </div>
                            </div>
                        </div>


                    </aside>

                </div>
            </div>

            <!-- section begin -->
            <section class="call-to-action bg-color dark pt20 pb20 mt80" data-speed="5" data-type="background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="mt10">Looking for best partner for your next construction works?</h3>
                        </div>

                        <div class="col-md-4 text-right">
                            <a href="contact.html" class="btn btn-line-black btn-fx">Hire Us Now</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->


        </div>

        <!-- footer begin -->
        
<?php include('partials-front/footer.php'); ?>