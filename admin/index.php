<?php include('partials/menu.php'); ?>
    
    <!-- main section starts here -->
    <div class="main-content">
    <div class="wrapper">
        <h1><strong>Dashboard</strong></h1>
        <br><br>
        <?php 
                 if(isset($_SESSION['login']))
                 {
                     echo $_SESSION['login']; //Displaying session message
                     unset($_SESSION['login']); //Removing session message
                 }

                ?>
                <br><br>

        <div class="col-4 text-center">
        <?php 
          //get all data from db
           $sql="SELECT * FROM tbl_category";
           //Execute query
           $res=mysqli_query($conn,$sql);
           //count rows
           $count=mysqli_num_rows($res);
           
          ?>
           <h1><?php echo $count; ?></h1>
            <br>
              Categories
         </div>


         <div class="col-4 text-center">
         <?php 
          //get all data from db
           $sql2="SELECT * FROM tbl_service";
           //Execute query
           $res2=mysqli_query($conn,$sql2);
           //count rows
           $count2=mysqli_num_rows($res2);
           
          ?>
           <h1><?php echo $count2; ?></h1>
            <br>
              Services
         </div>


         <div class="col-4 text-center">
         <?php 
          //get all data from db
           $sql3="SELECT * FROM tbl_contact";
           //Execute query
           $res3=mysqli_query($conn,$sql3);
           //count rows
           $count3=mysqli_num_rows($res3);
           
          ?>
           <h1><?php echo $count3; ?></h1>
            <br>
             Total  Messages
         </div>

         <div class="col-4 text-center">
           <h1>Cover Page</h1>
            <br>
              <a href="<?php echo SITEURL; ?>admin/manage-coverpage.php" style="text-decoration:none;">Change</a>
         </div>

         <div class="clearfix"></div>

        </div>
    </div>
    <!-- main section ends here -->

    <?php include('partials/footer.php')?>