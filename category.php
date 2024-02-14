<?php include('partials-front/menu.php'); ?>

        <!-- subheader -->
        <section id="subheader" data-stellar-background-ratio=".3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Our Categories</h1>
                        <div class="small-border-deco"><span></span></div>
                        <ul class="crumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="sep"></li>
                            <li>Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content" class="no-top no-bottom">
            <!-- section begin -->
            <section id="section-portfolio" aria-label="section-portfolio" class="no-top no-bottom">
                <div class="container">
                    <div class="spacer-single"></div>
                </div>
                 <div id="gallery" class="gallery full-gallery de-gallery pf_full_width pf_4_cols">
                   
                   <?php 
                   //create sql queryget all the details from the database
                   $sql="SELECT * FROM tbl_Category ORDER BY id DESC LIMIT 12";
                   //Execute the query
                   $res=mysqli_query($conn, $sql);
                   //Count the rows
                   $count =mysqli_num_rows($res);
                   //Check whether category is available or not
                   if($count>0)
                   {
                    //Category is available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get individual Data from database
                        $id =$row['id'];
                        $title = $row['title'];
                        $image_name =$row['image_name'];
                        
                        ?>
                        
                    <!-- gallery item -->
                    <div class="item hospitaly">
                        <div class="picframe">
                            <a href="category-details.php?id=<?php echo $id; ?>">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name"><?php echo $title; ?></span>
                                    </span>
                                </span>
                            </a>
                            <?php 
                             //Checking if image is available or not
                             if($image_name=="")
                             {
                                //Image is not available
                                echo "<div class='error'>Category Not Found...</div>";
                             }
                             else{
                                //image is available
                                ?>

                                 <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" />

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
                    //Category not available
                    echo "<div class='error'>Category Not Found...</div>";
                   }
                    
                    ?>

                </div>

            </section>
            <!-- section close -->
			
			<!-- section begin -->
            <section class="call-to-action bg-color dark pt20 pb20" data-speed="5" data-type="background">
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