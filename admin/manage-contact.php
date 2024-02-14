<?php include('partials/menu.php'); ?>
    
    <!-- main section starts here -->
    <div class="main-content">
    <div class="wrapper">
        <h1><strong>Manage Contact</strong></h1>
        <br><br>
        <?php 
          if(isset($_SESSION['delete']))
          {
              echo $_SESSION['delete']; //displaying session message
              unset($_SESSION['delete']); //removing session message
              
          }
        ?>
        <!-- button to add admin -->
        <!-- <a href="#" class="btn-primary">Create Admin</a> -->
   

        <table class="tbl-full">
            <tr>
                <th>Sno</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>

            <?php

             //Variable for pagination
             $num_per_page=05;
             if(isset($_GET["page"]))
             {
               $page=$_GET["page"];
             }
             else{
               $page=1;
             }
             $start_from=($page-1)*05;
              //Variable for pagination ends here 


              //Get all the contact details from the database
              $sql="SELECT * FROM tbl_Contact  ORDER BY id DESC LIMIT $start_from, $num_per_page";
              //Execute the query
              $res=mysqli_query($conn,$sql);
              //count the rows
              $count=mysqli_num_rows($res);
              $sn=1;

              if($count>0)
              {
                //we have data
                while($row=mysqli_fetch_assoc($res))
                {
                    //get individual details
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $message = $row['message'];

                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $email; ?></td>
                        <td width="200"><?php echo $message; ?></td>
                        
                        <td>
                        <a href="<?php echo SITEURL; ?>admin/delete-contact.php?id=<?php echo $id; ?>" class="btn-danger">Delete Message</a>
                        
                        </td>
                    </tr>

                    <?php
                }
              }
              else{
                //we dont have data
                echo "<div class='error'> No Contacts Available...</div>";
              }
            ?>          
        </table>

         <!-- pagination comes here -->
         <?php 
         $sql2="SELECT * FROM tbl_service";
         $res2=mysqli_query($conn,$sql2);
         $total_record=mysqli_num_rows($res2);
         $total_pages=ceil($total_record/$num_per_page);
         //echo $total_pages
         for($i=1;$i<=$total_pages;$i++)
         {
            echo "<a href='manage-contact.php?page=".$i."'>".$i."</a> ";
         }
        ?>

        <!-- pagination ends here -->

      </div>
    </div>
    <!-- main section ends here -->


    <?php include('partials/footer.php')?>