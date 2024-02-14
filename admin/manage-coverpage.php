<?php include('partials/menu.php'); ?>
    
    <!-- main section starts here -->
    <div class="main-content">
    <div class="wrapper">
        <h1><strong>Manage Home Cover </strong></h1>
        <br><br>
        <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br>
        <!-- button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-coverpage.php" class="btn-primary">Create Cover Page</a>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>Sno</th>
                <th>Title</th>
                <th>Active</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>

            <?php 

                //Variable for pagination
                $num_per_page=03;
                if(isset($_GET["page"]))
                {
                $page=$_GET["page"];
                }
                else{
                $page=1;
                }
                $start_from=($page-1)*03;
                //Variable for pagination ends here 


             //Get all data from bd
             $sql="SELECT * FROM tbl_coverpage ORDER BY id DESC LIMIT $start_from, $num_per_page";
             //Execte the query
             $res=mysqli_query($conn, $sql);
             //count the rows
             $count=mysqli_num_rows($res);
             $sn=1;

             if($count>0)
             {
                //we have data
                while($row=mysqli_fetch_assoc($res))
                {
                    //get individual data
                    $id = $row['id'];
                    $title =$row['title'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    $active = $row['active'];

                    ?>
                     <tr>
                        <td><?php echo $sn++; ?></td>
                        <td width="150"><?php echo $title; ?></td>
                        <td><?php echo $active; ?></td>
                        <td width="300"><?php echo $description; ?></td>
                        <td>
                            <?php 
                             //Check if image is available or not
                               if($image_name=="")
                               {
                                //we dont have image
                                echo "<div class='error'>Image Not Found..</div>";
                               }
                               else{
                                //image found
                                   ?>
                                   <img src="<?php echo SITEURL; ?>images/slider-images/<?php echo $image_name; ?>" width="100px">
                                   
                                   <?php
                               }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-coverpage.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-coverpage.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                        </td>
                    </tr>

                    <?php
                }
             }
             else
             {
                //we dont have data
                echo "<div class='error'>No Cover Page Found..</div>";
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
            echo "<a href='manage-coverpage.php?page=".$i."'>".$i."</a> ";
         }
        ?>

        <!-- pagination ends here -->

        

        </div>
    </div>
    <!-- main section ends here -->


    <?php include('partials/footer.php')?>