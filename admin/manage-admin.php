<?php include('partials/menu.php'); ?>
    
    <!-- main section starts here -->
    <div class="main-content">
    <div class="wrapper">
        <h1><strong>Manage Admin</strong></h1>
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
            if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found']; 
                        unset($_SESSION['user-not-found']);
                    }

            if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match']; 
                        unset($_SESSION['pwd-not-match']);
                    }

            if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd']; 
                        unset($_SESSION['change-pwd']);
                    }

                 ?>
            <br><br>
        <!-- button to add admin -->
        <a href="add-admin.php" class="btn-primary">Create Admin</a>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>Sno</th>
                <th>Fullname</th>
                <th>Username</th>
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

                //SQl to select all data from database
                $sql ="SELECT * FROM tbl_admin ORDER BY id DESC LIMIT $start_from, $num_per_page";
                //Execute the query
                $res=mysqli_query($conn, $sql);
                //Check whether we have data in database 
                if($res==true)
                {
                    //Count rows to check whether we have data in database or not
                    $count=mysqli_num_rows($res); //function to get all the rows
                    $sn=1;
                    
                    //Check the number of rows
                    if($count>0)
                    {
                        //We have data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //Using while loop, to get all the data from database
                            //while loop will run as long as we have data in database
                            //get individual data
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username =$rows['username'];
                            
                            //Display the values in our table
                            ?>
                             <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Pwd</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>
                                </td>
                            </tr>

                        <?php
                        }
                    }
                    else{
                        //we do not have data in databases
                    }

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
            echo "<a href='manage-admin.php?page=".$i."'>".$i."</a> ";
         }
        ?>

        <!-- pagination ends here -->

        

        </div>
    </div>
    <!-- main section ends here -->


    <?php include('partials/footer.php')?>