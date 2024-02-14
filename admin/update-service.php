<?php include('partials/menu.php'); ?>
<dic class="main-content">
    <div class="wrapper">
        <h1>Update Service</h1>
        <br><br>

        <?php 
        //check whether id is set or not
        if(isset($_GET['id']))
        {
            //get all details
            $id= $_GET['id'];

            //SQL query to get the selected services
            $sql2 = "SELECT * FROM tbl_service WHERE id=$id";
            //Execute the query
            $res2= mysqli_query($conn,$sql2);

            //get the value based on query execution
            $row2 = mysqli_fetch_assoc($res2);

            //get individual values of selected services
            $title =$row2['title'];
            $description =$row2['description'];
            $current_image =$row2['image_name'];
            $current_category =$row2['category_id'];
            $featured =$row2['featured'];
            $active =$row2['active'];
        }
        else{
            //redirect to manage services
            header('location:'.SITEURL.'admin/manage-service.php');

        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                   <td> <input type="text" name="title" value="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td><textarea name="description" cols="30" rows="5" ><?php echo $description; ?></textarea></td>
                </tr>
                <tr>
                    <td>Current Image: </td>
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
                            <img src="<?php echo SITEURL; ?>images/services/<?php echo $current_image; ?>" width="100px" height="100px">
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php 
                            //Query to get acticve catagories
                            $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                            //Execute the query
                            $res=mysqli_query($conn, $sql);
                            //count rows
                            $count =mysqli_num_rows($res);

                            //check whether categories is available or not
                            if($count>0)
                            {
                                //category available
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                   
                                      // echo "<option value='$category_id'>$category_title</option>";
                                      ?>
                                            <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                      <?php
                                }
                            }
                            else
                            {
                                //catage not available
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                            ?>
                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured =="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured =="No") {echo "checked";}?> type="radio" name="featured" value="No"> No
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
                $title =mysqli_real_escape_string($conn, $_POST['title']);
                $description =mysqli_real_escape_string($conn, $_POST['description']);
                $current_image =mysqli_real_escape_string($conn, $_POST['current_image']);
                $category =$_POST['category'];
                $featured =$_POST['featured'];
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
                        $image_name = "Service-Name-".rand(0000,9999).'.'.$ext; //This will rename image

                        //create source nd destinatoion to upload image
                        $src_path=$_FILES['image']['tmp_name']; //source path
                        $dst_path="../images/services/".$image_name; //destination path

                        //finally upload image
                        $upload =move_uploaded_file($src_path, $dst_path);

                        //check if iamge is uploaded or not
                        if($upload==false)
                        {
                            //failed to upload
                            $_SESSION['upload']="<div class='error'>Failed to Upload New Image.</div>";
                            header('location:'.SITEURL.'admin/manage-service.php');
                            //stop the process
                            die();

                        }
                         //3. Remove the image if new image is uploaded
                        //B.Remove current Image
                        if($current_image!=="")
                        {
                            //current image is available
                            //Rename the image
                            $remove_path ="../images/services/".$current_image;

                            $remove =unlink($remove_path);

                            //check whethere the image is removed or not
                            if($remove==false)
                            {
                                //failed to remove current image
                                $_SESSION['remove-failed']="<div class='error'>Failed to Remove Current Image. </div>";
                                //Redirect to manage service
                                //header('location:'.SITEURL.'admin/manage-service.php');
                                echo("<script>location.href='".SITEURL."admin/manage-service.php?msg=$msg';</script>");
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
                $sql3="UPDATE tbl_service SET
                title ='$title',
                description ='$description',
                image_name='$image_name',
                category_id ='$category',
                featured ='$featured',
                active ='$active'
                WHERE id=$id
                ";
                //exexute the query
                $res3=mysqli_query($conn,$sql3);
                //check whether the query is excuted or not
                if($res3==true)
                {
                    //query executed and service update
                    $_SESSION['update']="<div class='success'>Service Updated Successfully.</div>";
                    //header('location:'.SITEURL.'admin/manage-service.php');
                    echo("<script>location.href='".SITEURL."admin/manage-service.php';</script>");
                }
                else{
                    //failed to update service
                    $_SESSION['update']="<div class='error'>Failed to Update Service.</div>";
                  
                    //header('location:'.SITEURL.'admin/manage-service.php');
                    echo("<script>location.href='".SITEURL."admin/manage-service.php?msg=$msg';</script>");
                }
              
            }
        ?>
    </div>
</dic>



<?php include('partials/footer.php'); ?>