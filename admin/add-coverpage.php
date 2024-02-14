<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Cover Page</h1>
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
                    <td><input type="text" name="title" placeholder="Enter Cover Page Title"></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of Cover Page"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="Add Cover Page" class="btn-secondary">
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
           $title = $_POST['title'];
           $description = $_POST['description'];           
           $category = $_POST['category'];

           //Check whether radio button for feature and active is checked
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
                    $image_name ="Cover-Page-".rand(0000,9999).".".$ext; //new image name maybe like service-name-201.jpg
                    
                    //B/ Upload the image
                    //get the source file and destination path

                    //Source path is current location of the image
                    $src =$_FILES['image']['tmp_name'];

                    //Destination path for the image to be uploaded
                    $dst = "../images/slider-images/".$image_name;

                    //Finally upload the service image
                    $upload = move_uploaded_file($src, $dst);

                    //Check whether image uploaded or not
                    if($upload==false)
                    {
                        //failed to upload the image
                        //redirect to service page with error message
                        $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                        header("location:".SITEURL.'admin/add-coverpage.php');
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
           $sql2 = "INSERT INTO tbl_coverpage SET
           title = '$title',
           description = '$description',
           image_name = '$image_name',
           active = '$active'
           ";

           //Excute the query
           $res2=mysqli_query($conn,$sql2);
           //Check whether data is inserted or not
           //4. Redirect to service page
           if($res2 ==true)
           {
            //data inserted
            $_SESSION['add']="<div class='success'> Cover Page Changes Successfully.</div>";
            header("location:".SITEURL.'admin/manage-coverpage.php');
           }
           else{
            //failed to insert data
            $_SESSION['add']="<div class='error'> Failed to Add Service..</div>";
            header("location:".SITEURL.'admin/manage-coverpage.php');
           }

         
        }
        ?>

    </div>
</div>

   <!-- Calling the footer here -->
   <?php include('partials/footer.php'); ?>