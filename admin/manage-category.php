<?php include('partials/menu.php'); ?>
    
    <!-- main section starts here -->
    <div class="main-content">
    <div class="wrapper">
        <h1><strong>Manage Category</strong></h1>
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
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Create Category</a>
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

                //Variable for pagination


             //Query to get all category from database
              $sql ="SELECT * FROM tbl_category ORDER BY id DESC LIMIT $start_from, $num_per_page";
              //exectue the query
              $res=mysqli_query($conn,$sql);
              //count thr rows
              $count =mysqli_num_rows($res);
              $sn=1;
              //Check whether we have data in database
              if($count>0)
              {
                 //we have data in db
                 //get the data and display usingwhile loop
                 while($row=mysqli_fetch_assoc($res))
                 {
                    //get individual data from database
                     $id =$row['id'];
                     $title =$row['title'];
                     $description =$row['description'];
                     $image_name =$row['image_name'];
                     $active =$row['active'];
                     $featured =$row['featured'];

                     ?>
                      <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $active; ?></td>
                            <td><?php echo $featured; ?></td>
                            <td>
                                <?php
                                    //Check whether the image name is available or not
                                    if($image_name!="")
                                    {
                                        //Display the image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">

                                        <?php
                                    }
                                    else{
                                        //display the message
                                        echo "<div class='error'> Image Not Added...</div>";
                                    }
                                ?>
                            </td>

                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                            </td>
                        </tr>

                     <?php

                 }
              }
              else
              {
                //we dont have data in database
                //we will display the message insed thetable
                //nbreak the php
                ?>

                <tr>
                    <td colspan="6"><div class="error">No Category Created..</div></td>

                </tr>

                <?php
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
                    echo "<a href='manage-category.php?page=".$i."'>".$i."</a> ";
                }
                ?>

                <!-- pagination ends here -->


        

        </div>
    </div>
    <!-- main section ends here -->


    <?php include('partials/footer.php')?>