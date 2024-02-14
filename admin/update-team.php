<?php include('partials/menu.php'); ?>
<dic class="main-content">
    <div class="wrapper">
        <h1>Update Team Member</h1>
        <br><br>

        <?php 
        //check whether id is set or not
        if(isset($_GET['id']))
        {
            //get all details
            $id= $_GET['id'];

            //SQL query to get the selected services
            $sql2 = "SELECT * FROM tbl_team WHERE id=$id";
            //Execute the query
            $res2= mysqli_query($conn,$sql2);

            //get the value based on query execution
            $row2 = mysqli_fetch_assoc($res2);

            //get individual values of selected services
            $name =$row2['name'];
            $position =$row2['position'];
            $description =$row2['description'];
            $current_image =$row2['image_name'];
            $active =$row2['active'];
        }
        else{
            //redirect to manage services
            header('location:'.SITEURL.'admin/manage-team.php');

        }
        ?>
        

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                   <td> <input type="text" name="name" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>Designation: </td>
                   <td> <input type="text" name="position" value="<?php echo $position; ?>"></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td><textarea name="description" cols="30" rows="5" ><?php echo $description; ?></textarea></td>
                </tr>
                <tr>
                    <td>Current Profile: </td>
                    <td>
                        <?php 
                        if($current_image =="")
                        {
                            //image not available
                            echo "<div class='error'>Image Not Found.</div>";
                        }
                        else{
                            //image available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/employees/<?php echo $current_image; ?>" width="100px">
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Profile: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active =="Yes") {echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active =="No") {echo "checked";}?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                        <input type="submit" name="submit" value="Update Service" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            //1. check if button cliked
            if(isset($_POST['submit']))
            {
                //echo "clicked";

                //1. get all the details from the form
                $id =mysqli_real_escape_string($conn, $_POST['id']);
                $name =mysqli_real_escape_string($conn, $_POST['name']);
                $position =mysqli_real_escape_string($conn, $_POST['position']);
                $description =mysqli_real_escape_string($conn, $_POST['description']);
                $current_image =mysqli_real_escape_string($conn, $_POST['current_image']);
                $active =$_POST['active'];

                //2. upload the image if selected
                //check whther upload button is clickeed or not
                if(isset($_FILES['image']['name']))
                {
                    //upload image cliecked
                    $image_name = $_FILES['image']['name']; //New image name

                    //check whethere file is available or not
                    if($image_name!=="")
                    {
                        //image available
                        //A. Uploading new Image
                        //Rename the image
                        $ext= end(explode('.',$image_name)); //gets the extension of image
                        $image_name = "Employee-Name-".rand(0000,9999).'.'.$ext; //This will rename image

                        //create source nd destinatoion to upload image
                        $src_path=$_FILES['image']['tmp_name']; //source path
                        $dst_path="../images/employees/".$image_name; //destination path

                        //finally upload image
                        $upload =move_uploaded_file($src_path, $dst_path);

                        //check if iamge is uploaded or not
                        if($upload==false)
                        {
                            //failed to upload
                            $_SESSION['upload']="<div class='error'>Failed to Upload New Profile.</div>";
                            header('location:'.SITEURL.'admin/manage-team.php');
                            //stop the process
                            die();

                        }
                         //3. Remove the image if new image is uploaded
                        //B.Remove current Image
                        if($current_image!=="")
                        {
                            //current image is available
                            //Rename the image
                            $remove_path ="../images/employees/".$current_image;

                            $remove =unlink($remove_path);

                            //check whethere the image is removed or not
                            if($remove==false)
                            {
                                //failed to remove current image
                                $_SESSION['remove-failed']="<div class='error'>Failed to Remove Current Profile. </div>";
                                //Redirect to manage team
                                //header('location:'.SITEURL.'admin/manage-team.php');
                                echo("<script>location.href='".SITEURL."admin/manage-team.php?msg=$msg';</script>");
                                //stop the process
                                die();
                            }
                        }
                    }
                    else{
                            $image_name = $current_image; //Default image when image is not selected
                    }
                }
                else
                {
                    $image_name = $current_image; //Default button is not clicked
                }
               
                //4. update the service in database
                $sql3="UPDATE tbl_team SET
                name ='$name',
                position ='$position',
                description ='$description',
                image_name='$image_name',
                active ='$active'
                WHERE id=$id
                ";
                //exexute the query
                $res3=mysqli_query($conn,$sql3);
                //check whether the query is excuted or not
                if($res3==true)
                {
                    //query executed and team member update
                    $_SESSION['update']="<div class='success'>Team Member Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-team.php');
                   // echo("<script>location.href='".SITEURL."admin/manage-team.php';</script>");
                }
                else{
                    //failed to update team member
                    $_SESSION['update']="<div class='error'>Failed to Update Team Member.</div>";
                  
                   header('location:'.SITEURL.'admin/manage-team.php');
                    //echo("<script>location.href='".SITEURL."admin/manage-team.php?msg=$msg';</script>");
                }
              
            }
        ?>
    </div>
</dic>



<?php include('partials/footer.php'); ?>