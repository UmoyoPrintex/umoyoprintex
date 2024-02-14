<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Service</h1>
        <br><br>

        <?php 
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" placeholder="Enter Title"></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of service"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <?php 
                            //create PHP to display categories from database
                            //1. Create SQL to get all active categories from database
                            $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                            
                            //Execute query
                            $res =mysqli_query($conn,$sql);

                            //Count rows to check whether we have categories or not
                            $count = mysqli_num_rows($res);

                            //if count > 0 we have categories else we dont have categories
                            if($count>0)
                            {
                                //We have catageories
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //Get the details of categories
                                    $id = $row['id'];
                                    $title =$row['title'];
                                    
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            }
                            else{
                                //we dont have categories
                                ?>
                                 <option value="0">No Categories Found. </option>
                                <?php
                            }
                            //2. Display on drop down
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active :</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Service" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        //check if button is clicked or not
        if(isset($_POST['submit']))
        {
            //Add service in database
           // echo "clicked";
           //1. Get the data from form 
           $title = mysqli_real_escape_string($conn, $_POST['title']);
           $description = mysqli_real_escape_string($conn, $_POST['description']);           
           $category = mysqli_real_escape_string($conn, $_POST['category']);

           //Check whether radio button for feature and active is checked
           if(isset($_POST['featured']))
           {
             $featured =$_POST['featured'];
           }
           else{
                $featured ="No"; //setting default value
           }

           if(isset($_POST['active']))
           {
                $active =$_POST['active'];
           }
           else{
                $active ="No"; //setting default value
           }

           //2. Upload the image if selected
           //Check whether select image is clicked or not and upload the image only if image is selected
           if(isset($_FILES['image']['name']))
            {
                //Get the details of the selected image
                $image_name =$_FILES['image']['name'];
                //check whether image is selected or not and upload image if only selected
                if($image_name!="")
                {
                    //image is selected
                    //A. Rename the image
                    //Get the extension ext of select image (jpg, png, gif etc)"chamanga.jpg"
                    $ext = end(explode('.',$image_name));

                    //create new name for image
                    $image_name ="Service-Name-".rand(0000,9999).".".$ext; //new image name maybe like service-name-201.jpg
                    
                    //B/ Upload the image
                    //get the source file and destination path

                    //Source path is current location of the image
                    $src =$_FILES['image']['tmp_name'];

                    //Destination path for the image to be uploaded
                    $dst = "../images/services/".$image_name;

                    //Finally upload the service image
                    $upload = move_uploaded_file($src, $dst);

                    //Check whether image uploaded or not
                    if($upload==false)
                    {
                        //failed to upload the image
                        //redirect to service page with error message
                        $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                        header("location:".SITEURL.'admin/add-service.php');
                        //stop the process
                        die();
                    }
                }
            }
            else
            {
                $image_name =""; //Setting default value as blank
            }
           //3. Insert into database
           //Create Sql query to save or add service
           //For numerical value we do not need to pass the value inside ""quotes but for string values is compusory
           $sql2 = "INSERT INTO tbl_service SET
           title = '$title',
           description = '$description',
           image_name = '$image_name',
           category_id = $category,
           featured = '$featured',
           active = '$active'
           ";

           //Excute the query
           $res2=mysqli_query($conn,$sql2);
           //Check whether data is inserted or not
           //4. Redirect to service page
           if($res2 ==true)
           {
            //data inserted
            $_SESSION['add']="<div class='success'> Service Created Successfully.</div>";
            header("location:".SITEURL.'admin/manage-service.php');
           }
           else{
            //failed to insert data
            $_SESSION['add']="<div class='error'> Failed to Add Service..</div>";
            header("location:".SITEURL.'admin/manage-service.php');
           }

         
        }
        ?>

    </div>
</div>

   <!-- Calling the footer here -->
   <?php include('partials/footer.php'); ?>