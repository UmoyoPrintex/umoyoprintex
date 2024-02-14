<?php include('partials/menu.php'); ?>
    
    <!-- main section starts here -->
    <div class="main-content">
    <div class="wrapper">
        <h1><strong>Manage Service</strong></h1>
        <br><br>
        <?php

                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //displaying session message
                    unset($_SESSION['add']); //removing session message
                    
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //displaying session message
                    unset($_SESSION['delete']); //removing session message
                    
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //displaying session message
                    unset($_SESSION['update']); //removing session message
                    
                }
        ?>
        <br><br>
        <!-- button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-service.php" class="btn-primary">Create Service</a>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>Sno</th>
                <th>Title</th>
                <th>Active</th>
                <th>Featured</th>
                <th>Image</th>
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


              //create sql to get all the services
              $sql ="SELECT * FROM tbl_service ORDER BY id DESC LIMIT $start_from, $num_per_page";
              //Execute the query
              $res=mysqli_query($conn, $sql);

              $count=mysqli_num_rows($res);
              $sn=1;

             


              
              if($count>0)
              {
                //we have data in db so we get all the values
                while($row=mysqli_fetch_assoc($res))
                {
                    //get individual data from database
                    $id =$row['id'];
                    $title =$row['title'];
                    $image_name=$row['image_name'];
                    $active =$row['active'];
                    $featured=$row['featured'];

                    ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $active; ?></td>
                        <td><?php echo $featured; ?></td>
                        <td>
                            <?php 
                             //Check wheteher we have image or not
                               if($image_name=="")
                               {
                                //we do not have image display error message
                                echo "<div class='error'> No Image Found...</div>";
                               }
                               else
                               {
                                //We have image, display image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" width="100px">

                                <?php
                               }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-service.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-service.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                        </td>
                    </tr>

                    <?php
                   }
                 }
              else{
                //we dont have data in database
                echo"<tr> <td colspan='7' class='error'>Service Not Added..</td></tr>";
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
            echo "<a href='manage-service.php?page=".$i."'>".$i."</a> ";
         }
        ?>

        <!-- pagination ends here -->

        

        </div>
    </div>
    <!-- main section ends here -->


    <?php include('partials/footer.php')?>