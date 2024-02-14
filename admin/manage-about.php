<?php include('partials/menu.php'); ?>
    
    <!-- main section starts here -->
    <div class="main-content">
    <div class="wrapper">
        <h1><strong>Manage About </strong></h1>
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
        <a href="<?php echo SITEURL; ?>admin/add-about.php" class="btn-primary">Create About</a>
        <br><br>

        <table class="tbl-full">
            <tr >
                <th width="10">Sno</th>
                <th width="100">Vision</th>
                <th width="100">Mission</th>
                <!-- <th width="100">Description</th> -->
                <th width="100">Intro</th>
                <th width="40">Year</th>
                <th width="100">Title</th>
                <!-- <th width="100">Description2</th> -->
                <th width="100">Image</th>
                <th width="100">Actions</th>
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
                
                //Variable ends here pagination


             //get all tyhe data from the database
               $sql="SELECT * FROM tbl_about_history ORDER BY id DESC LIMIT $start_from, $num_per_page";
               //Excute the query
               $res=mysqli_query($conn, $sql);
               //Count the rows
               $count = mysqli_num_rows($res);
               $sn=1;

               if($count>0)
               {
                    //We have data in database
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get individual data from database
                         $id = $row['id'];
                         $vision = $row['vision'];
                         $mission = $row['mission'];
                         $description = $row['description'];
                         $image_name = $row['image_name'];
                         $intro =$row['intro'];
                         $history_year = $row['history_year'];
                         $title = $row['title'];
                         $description2 = $row['description2'];

                         ?>

                         <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $vision; ?></td>
                            <td><?php echo $mission; ?></td>
                            <td><?php echo $intro; ?></td>
                            <td><?php echo $history_year; ?></td>
                            <td><?php echo $title; ?></td>
                            <td>
                                <?php
                                 //checking if image is available or not
                                 if($image_name=="")
                                 {
                                    //image not available
                                    echo "Image not found..";
                                 }
                                 else{
                                    //image available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/about/<?php echo $image_name; ?>" width="100px">

                                    <?php
                                 }
                                ?>
                            </td>
                            <td>
                                 <a href="<?php echo SITEURL; ?>admin/update-about.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-about.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                        
                             </td>
                        </tr>

                         <?php
                    }
               }
               else{
                //We do not have data in database
                echo"<tr> <td colspan='10' class='error'>About Us Not Added..</td></tr>";
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
                echo "<a href='manage-about.php?page=".$i."'>".$i."</a> ";
            }
            ?>

            <!-- pagination ends here -->


        </div>
    </div>
    <!-- main section ends here -->


    <?php include('partials/footer.php')?>