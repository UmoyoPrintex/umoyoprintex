<?php include('partials/menu.php'); ?>
    
    <!-- main section starts here -->
    <div class="main-content">
    <div class="wrapper">
        <h1><strong>Manage Team </strong></h1>
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
        <a href="<?php echo SITEURL; ?>admin/add-team.php" class="btn-primary">Create Team Member</a>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>Sno</th>
                <th>Name</th>
                <th>Position</th>
                <th>Active</th>
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
                //Variable ends here


             //Create sql to get all the details from database
                $sql ="SELECT * FROM tbl_team ORDER BY id DESC LIMIT $start_from, $num_per_page";
                //Execute the query
                $res=mysqli_query($conn, $sql);
                //Count the rows
                $count=mysqli_num_rows($res);
                $sn=1;

                if($count>0)
                {
                    //we have data in database
                    //using while loop to get all the values from database
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //we get individual data from database
                        $id = $row['id'];
                        $name = $row['name'];
                        $position= $row['position'];
                        $active =$row['active'];
                        $image_name = $row['image_name'];

                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $position; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <?php 
                                     //Check if image is available or not
                                       if($image_name=="")
                                       {
                                         //We do not have an image, so we display an error message
                                         echo "<div class='error'> No Image Found...</div>";
                                       }
                                       else{
                                        //We have an image, we end the <php and start the <php and in between we wright pur code for image
                                        ?>
                                          <img src="<?php echo SITEURL; ?>images/employees/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                       }
                                    ?>
                                </td>
                                <td>
                                <a href="<?php echo SITEURL; ?>admin/update-team.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-team.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                        
                                </td>
                            </tr>


                        <?php
                    }
                }
                else{
                    //we do not have data in database
                    echo"<tr> <td colspan='6' class='error'>Service Not Added..</td></tr>";
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
            echo "<a href='manage-team.php?page=".$i."'>".$i."</a> ";
         }
        ?>

        <!-- pagination ends here -->

        

        </div>
    </div>
    <!-- main section ends here -->


    <?php include('partials/footer.php')?>