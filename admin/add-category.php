<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Create Category</h1>
        <br/><br/>

        <!-- if message is failed to add then this message is displayed on same page -->
        <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }
        ?>
        <!-- if message is failed to add then this message is displayed on same page -->
        <br/><br/>

        <!-- Add category start here -->
        <form action="" method="POST" enctype="multipart/form-data">
            
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Category Title">
                </td>
            </tr>
            <tr>
                <td>Select Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" cols="30" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                </td>
            </tr>
            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
         <!-- Add category ends here here -->

         <?php 
         //check whether button is clicked or not
         if(isset($_POST['submit']))
         {
            //echo "Clicked";
            //1. Get the values from the categeory form
            //mysqli_real_escape_string- used for securing data, to prevent attacks from user hacking..
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);

            //for radio input type we need to check whether button is select or not
            if(isset($_POST['featured']))
            {
                //get the value from from form
                $featured = $_POST['featured'];
            }
            else{
                //set the default value
                $featured = "No";
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else{
                //set the default value
                $active = "No";
            }

            //Check whether image is selected or not and Set value for image name accordingly
            //print_r($_FILES['image']);
            //die();//Break the code here
            if(isset($_FILES['image']['name']))
            {
                //Upload the image
                //To upload image we need image name, source path and destination path
                $image_name =$_FILES['image']['name'];

                //upload the image only if image is selected
                if($image_name!="")
                {

             
                //Auto Rename image : Renaming the image if its inserted twice with the same name
                //Get the extension of our image (jpg,png,gif ext) ex "NRC.jpg"
                $ext = end(explode('.',$image_name));
                //Remane the image
                $image_name = "Service_Category_".rand(000,999).'.'.$ext;

                $source_path =$_FILES['image']['tmp_name'];

                $destination_path = "../images/category/". $image_name;

                //Finally Upload the image
                $upload = move_uploaded_file($source_path, $destination_path);

                //Check whetherthe image is uploaded or not
               // and if image is not uploaded then we will stop the process and redirect with error message
               if($upload == false)
               {
                //SET message
                $_SESSION['upload']="<div class='error'> Failed to upload Image. </div>";
                  //Redirect page to category page
                  header("location:".SITEURL.'admin/add-category.php');
                  //STop the process so that data is not added into database
                  die();
               }
             }
            }
            else{
                //Dont upload image and set image_name value as blank
                $image_name="";
            }

            //2. Create SQl query to insert catagory into database
            $sql = "INSERT INTO tbl_category SET
            title ='$title',
            image_name ='$image_name',
            description ='$description',
            featured ='$featured',
            active ='$active'
            ";

            //3. Execute the query and dave in databae
            $res =mysqli_query($conn, $sql);

            ////4. Check whether query is executed or not and data added to db
            if($res ==true)
            {
                //Query excuted and category add
                $_SESSION['add'] ="<div class='success'> Category Creaated Successfully.</div>";
                //Redirect page to category page
                header("location:".SITEURL.'admin/manage-category.php');
            }
            else{
                //failed to add category
                $_SESSION['add'] ="<div class='error'> Failed to Create Category.</div>";
                //Redirect page to category page
                header("location:".SITEURL.'admin/add-category.php');
            }
         }
         ?>
    </div>
</div>

    <!-- Calling the footer here -->
    <?php include('partials/footer.php'); ?>