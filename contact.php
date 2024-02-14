<?php include('partials-front/menu.php'); ?>

        <!-- subheader -->
        <section id="subheader" data-stellar-background-ratio=".3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Contact Us</h1>
                        <div class="small-border-deco"><span></span></div>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep"></li>
                            <li>Contact Us</li>
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
                    <div class="col-md-8">
                        <div class="de_tab tab_style_2">
                            <ul class="de_nav">
                                <li class="active" data-wow-delay="0s"><span>Zambia</span><div class="v-border"></div>
                                </li>
                            </ul>

                            <div class="de_tab_content tc_style-1">

                                <div id="tab1">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="map-container">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3846.2077405619175!2d28.279221675122496!3d-15.419335085169974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1940f35eac95253d%3A0xecb2734c7aaa83bd!2sPermanent%20House%2C%20Lusaka!5e0!3m2!1sen!2szm!4v1707838809554!5m2!1sen!2szm" width="600" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <address class="address-style-2">
                                                <span><strong>Address:</strong>Permanent House, Room 245, Second Floor, Along Cairo Road Lusaka, Zambia.</span>
                                                <span><strong>Phone:</strong>+260 973.857.222</span>
                                                <span><strong>Fax:</strong>+260 972.222.112</span>
                                                <span><strong>Email:</strong><a href="mailto:umoyoprintex@gmail.com">umoyoprintex@gmail.com</a></span>
                                                <span><strong>Web:</strong><a href="#.">http://umoyoprintex.com</a></span>
                                                <span><strong>Open</strong>Monday - Friday 09:00 - 17:00</span>
                                            </address>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="padding30" data-bgcolor="#f5f5f5">

                            <h3>Send Us Message
							<span class="tiny-border"></span>
                            </h3>
                            <form id='contact_form' method="post" action=''>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <input type='text' name='name'  class="form-control" placeholder="Your Name" required>
                                        </div>
                                        <div>
                                            <input type='text' name='email'  class="form-control" placeholder="Your Email" required>
                                        </div>
                                        <div>
                                            <input type='text' name='phone' class="form-control" placeholder="Your Phone" required>
                                        </div>
                                        <div>
                                            <textarea name='message' class="form-control" placeholder="Your Message" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div id='submit'>
                                            <input type='submit' name='submit'  value='Submit' class="btn btn-line">
                                        </div>
                                     </div>
                                </div>
                            </form>

                            <!-- code for php comes here -->
                            <?php 
                            //check if button is clicked or not
                            if(isset($_POST['submit']))
                            {
                                //Add about us in database
                            // echo "clicked";
                            //1. Get the data from form 
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $message = $_POST['message'];

                            //2. Insert into database
                            //Create Sql query to save or add service
                            //For numerical value we do not need to pass the value inside ""quotes but for string values is compusory
                            $sql2 = "INSERT INTO tbl_contact SET
                            name = '$name',
                            email = '$email',
                            phone = $phone,
                            message = '$message'
                            ";

                            //Excute the query
                            $res2=mysqli_query($conn,$sql2);
                            //Check whether data is inserted or not
                            //4. Redirect to service page
                            if($res2 ==true)
                            {
                                //data inserted
                                echo "Message Has Been Sent Successfully";
                            }
                            else{
                                //failed to insert data
                                echo "Failed to Send Message, try later.";
                            }  
                        }
                    ?>
                    
                </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer begin -->
        
<?php include('partials-front/footer.php'); ?>