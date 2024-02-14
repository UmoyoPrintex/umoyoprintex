<?php include('partials-front/menu.php'); ?>

        <!-- subheader -->
        <section id="subheader" data-stellar-background-ratio=".3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>History</h1>
                        <div class="small-border-deco"><span></span></div>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep"></li>
                            <li>History</li>
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
                     //get all details from db such as year, title and description
                     $sql ="SELECT title,history_year,description2 FROM tbl_about_history ";
                     //Execute the query
                     $res=mysqli_query($conn, $sql);
                     //Coun rows
                     $count = mysqli_num_rows($res);

                     if($count>0)
                     {
                        //we have data
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get individual data
                           // $id =$row['id'];
                            //$intro =$row['intro'];
                            $title =$row['title'];
                            $history_year =$row['history_year'];
                            $description2=$row['description2'];

                            ?>
                            <div class="col-md-9">
                            <p class="intro mb30">
                             Umoyo printex Company Ltd is a building state of the art full service printing company that was established in 2023. it is focused
                             on the printing needs of education institution, the corporate sector and geneal public.    
                            </p>

                            <div class="timeline">
                            <div class="tl-block">
                                <div class="tl-time">
                                    <h3><?php echo $history_year; ?></h3>
                                </div>
                                <div class="tl-bar">
                                    <div class="tl-line"></div>
                                </div>
                                
                                <div class="tl-message">
                                    <div class="tl-icon">&nbsp;</div>
                                    <div class="tl-main">
                                        <h3><?php echo $title; ?></h3>
                                        <?php echo $description2; ?>
                                    </div>
                                </div>
                            </div>
                         </div>

                        </div>
                            

                            <?php

                        }
                     }
                     else{
                        //we dont have data
                        echo "<div class='error'>No Information Found..</div>";
                     }
                    ?>
                        <div >

                    </div>


                    <aside id="sidebar" class="col-md-3">
                        <div class="widget">
                            <ul id="services-list">
                                <li><a href="about.html">Company Overview</a></li>
                                <li class="active"><a href="about-history.html">Company History</a></li>
                                <li><a href="about-team.html">Our Team</a></li>
                            </ul>
                        </div>

                        <div class="widget">
                            <div class="padding30 text-black" data-bgimage="url(images/background/banner-1.jpg)">
                                <h4>Attention!</h4>
                                Looking for best partner for your next construction works? Sed ut perspiciatis unde omnis iste natus error sit voluptatem.
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