<?php include('partials-front/menu.php'); ?>

        <!-- subheader -->
        <section id="subheader" data-stellar-background-ratio=".3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Services</h1>
                        <div class="small-border-deco"><span></span></div>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep"></li>
                            <li>Services</li>
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
                 $sql ="SELECT * FROM tbl_Service ORDER BY id LIMIT 15";
                 //Execute query
                 $res=mysqli_query($conn, $sql);
                 //count rows
                 $count = mysqli_num_rows($res);

                 if($count>0)
                 {
                    //we have data
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get individual data
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>
                        
                        <div class="col-md-4 col-sm-6 mb30">
                        <figure class="pic-hover hover-scale mb20">
                            <span class="center-xy">
                                <a href="service-details.php?id=<?php echo $id; ?>">
                                    <i class="fa fa-plus btn-action btn-action-hide"></i></a>
                            </span>
                            <span class="bg-overlay"></span>
                            <?php 
                            //checking if image is available
                            if($image_name=="")
                            {
                                //image not available
                                echo "<div class='error'>No Services Available..</div>";
                            }
                            else{
                                ?>
                                <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" class="img-responsive" alt="">

                                <?php
                            }
                            
                            ?>
                            
                        </figure>

                        <h3><?php echo $title; ?></h3>
                        <p style="text-align:justify; "><?php echo $description; ?></p>
                        <br>
                        <a href="<?php echo SITEURL; ?>service-details.php?id=<?php echo $id; ?>" class="read_more mt10">read more <i class="fa fa-chevron-right id-color"></i></a>
                    </div>

                      <?php   
                    }
                 }
                 else{
                    //we dont have data
                    echo "<div class='error'>No Services Available..</div>";
                 }
                   ?>
                    <div class="clearfix"></div>

                </div>
            </div>

            <!-- section begin -->
            <section class="call-to-action bg-color dark mt80 pt20 pb20" data-speed="5" data-type="background">
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
            <!-- logo carousel section close -->

        </div>

        <!-- footer begin -->
        
<?php include('partials-front/footer.php'); ?>