<?php include('partials-front/menu.php'); ?>

        <!-- subheader -->
        <section id="subheader" data-stellar-background-ratio=".3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Team</h1>
                        <div class="small-border-deco"><span></span></div>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep"></li>
                            <li>Team</li>
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
                    <div class="col-md-9">
                        <div class="row">

                        <?php 
                         //Get all data from db
                         $sql="SELECT * FROM tbl_team ORDER BY id";
                         $res=mysqli_query($conn,$sql);
                         $count=mysqli_num_rows($res);
                         if($count>0)
                         {
                            //we have data
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get individual data
                                $id = $row['id'];
                                $name = $row['name'];
                                $position = $row['position'];
                                $description = $row['description'];
                                $image_name = $row['image_name'];

                                ?>
                                
                                <div class="col-md-4">
                                <div class="profile_pic">
                                    <figure class="pic-hover hover-scale mb30">
                                        <?php 
                                         if($image_name=="")
                                         {
                                            //we dont have image
                                            echo "<div class='error'>Image Not Found...</div>";
                                         }
                                         else{
                                            //image available
                                            ?>

                                            <img src="<?php echo SITEURL; ?>images/employees/<?php echo $image_name; ?>" class="img-responsive">
                                            
                                            <?php
                                         }
                                        ?>
                                       
                                    </figure>
                                    <h3><?php echo $name; ?></h3>
                                    <span class="subtitle"><?php echo $position; ?></span>
                                    <span class="tiny-border"></span>
                                    <p><?php echo $description; ?></p><br>
                                    <a href="#" class="read_more mt10">read more <i class="fa fa-chevron-right id-color"></i></a>
                                </div>
                               </div>

                                <?php
                            }
                         }
                         else{
                            //we dont have data
                            echo "<div class='error'>Team Memeber Not Found..</div>";
                         }
                        ?>

                        </div>
                    </div>

                    <aside id="sidebar" class="col-md-3">
                        <div class="widget">
                            <ul id="services-list">
                                <li><a href="about.html">Company Overview</a></li>
                                <li><a href="about-history.html">Company History</a></li>
                                <li class="active"><a href="about-team.html">Our Team</a></li>
                            </ul>
                        </div>

                        <div class="widget">
                            <div class="padding30 text-black" data-bgimage="url(images/background/banner-1.jpg)">
                                <h4>Attention!</h4>
                                Looking for best partner for your Business Branding?
								<div class="text-center">
                                    <a href="contact.html" class="btn btn-line-black btn-fx mt20">Hire Us Now</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    <!-- footer begin -->
<?php include('partials-front/footer.php'); ?>