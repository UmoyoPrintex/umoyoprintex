<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add About Us</h1>
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
                    <td>Vision: </td>
                    <td>
                        <textarea name="vision" cols="30" rows="5" placeholder="Enter Your Vision..."></textarea>
                    </td>
                    
                </tr>
                <tr>
                    <td>Mission: </td>
                    <td>
                        <textarea name="mission" cols="30" rows="5" placeholder="Enter Your Mission..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Company Info: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Enter Company Information..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>History Intro: </td>
                    <td>
                        <textarea name="intro" cols="30" rows="5" placeholder="Enter History Intro..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>History Title: </td>
                    <td>
                        <input type="text"name="title"placeholder="Enter Title..." >
                       
                    </td>
                </tr>
                <tr>
                    <td>History Descr: </td>
                    <td>
                        <textarea name="description2" cols="30" rows="5" placeholder="Enter History Description..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Create About" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        //check if button is clicked or not
        if(isset($_POST['submit']))
        {
            //Add about us in database
           // echo "clicked";
           //1. Get the data from form 
           $vision = $_POST['vision'];
           $mission = $_POST['mission'];
           $description = $_POST['description'];
           $image_name = $_POST['image_name'];
           $history_year = date("Y-m-d h:i:sa"); //year dates
           $title = $_POST['title'];
           $description2 = $_POST['description2'];
           $intro = $_POST['intro'];

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
                    $image_name ="About-Name-".rand(0000,9999).".".$ext; //new image name maybe like service-name-201.jpg
                    
                    //B/ Upload the image
                    //get the source file and destination path

                    //Source path is current location of the image
                    $src =$_FILES['image']['tmp_name'];

                    //Destination path for the image to be uploaded
                    $dst = "../images/about/".$image_name;

                    //Finally upload the service image
                    $upload = move_uploaded_file($src, $dst);

                    //Check whether image uploaded or not
                    if($upload==false)
                    {
                        //failed to upload the image
                        //redirect to service page with error message
                        $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                        header("location:".SITEURL.'admin/add-about.php');
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
           $sql2 = "INSERT INTO tbl_about_history SET
           vision = '$vision',
           mission ='$mission',
           description = '$description',
           image_name = '$image_name',
           history_year = '$history_year',
           title = '$title',
           description2 = '$description2',
           intro = '$intro'
           ";

           //Excute the query
           $res2=mysqli_query($conn,$sql2);
           //Check whether data is inserted or not
           //4. Redirect to service page
           if($res2 ==true)
           {
            //data inserted
            $_SESSION['add']="<div class='success'> About Us Created Successfully.</div>";
            header("location:".SITEURL.'admin/manage-about.php');
           }
           else{
            //failed to insert data
            $_SESSION['add']="<div class='error'> Failed to Create Abiut Us..</div>";
            header("location:".SITEURL.'admin/manage-about.php');
           }

         
        }
        ?>

    </div>
</div>

   <!-- Calling the footer here -->
   <?php include('partials/footer.php'); ?>