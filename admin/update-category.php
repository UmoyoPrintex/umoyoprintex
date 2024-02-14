<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>
            <br><br>

            <?php 
            //Check whether id is set or not
            if(isset($_GET['id']))
            {
                //Get the id and all other details
                //echo "geting the data";
                $id = $_GET['id'];
                //create sql query to get all other details
                $sql="SELECT * FROM tbl_category WHERE id=$id";

                //Execute the query
                $res =mysqli_query($conn, $sql);

                //Count thr rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //get the data
                    $row = mysqli_fetch_assoc($res);

                    //get individual data
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $description = $row['description'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    
                }
                else{
                    //redirect to manage category with smessage
                    $_SESSION['no-category-found']="<div class='error'> Category not found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');

                }

            }
            else{
                //redirect to manage category
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                       <?php 
                       
                       if($current_image!="")
                       {
                        //Display the image
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image; ?>" width="150px" height="100px">
                        <?php
                       }
                       else{
                        //Display message
                        echo "<div class='error'>Image not Added.</div>";
                       }
                       ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked"; }?> type="radio" name="featured" value="Yes">Yes

                        <input <?php if($featured=="No"){echo "checked"; }?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked"; }?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked"; }?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                    
                </tr>
            </table>
            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    //echo "Clicked";
                    //1. get all the value from our form
                    $id = $_POST['id'];
                    $title =$_POST['title'];
                    $description =$_POST['description'];
                    $current_image= $_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    //2. Updating New Image if selected
                    //Check whether image is select or not
                    if(isset($_FILES['image']['name']))
                    {
                        //get the image details
                        $image_name =$_FILES['image']['name'];
                        //check whether image is available or not
                        if($image_name!=="")
                        {
                            //Image available

                            //A. Upload the new image
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
                                    header("location:".SITEURL.'admin/manage-category.php');
                                    //STop the process so that data is not added into database
                                    die();
                                 }
                            //B. Remeove the current image if available
                            if($current_image!=="")
                            {
                                $remove_path = "../images/category/".$current_image;
                                $remove = unlink($remove_path);

                                //cehcl whether the image is removed or not
                                //if fail to remove then display message and stop process
                                if($remove==false)
                                {
                                    //failed to removed the image
                                    $_SESSION['failed-remove']="<div class='error'>Failed to Removed Current Image.</div>";
                                    header('location:'.SITEURL.'admin/manage-category.php');
                                    die(); //stop the process
                                }
                            }
                                
                        }
                        else{
                            //our image will be current image
                            $image_name = $current_image;
                        }
                    }
                    else{
                        $image_name = $current_image;
                    }

                    //3. Update the database
                    $sql2 ="UPDATE tbl_category SET
                    title = '$title',
                    description = '$description',
                    image_name='$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                    ";

                    //Execute the query
                    $res2=mysqli_query($conn,$sql2);
                    
                    //4. redirect to manage catageory with message
                    //check whether query executed or not
                    if($res2==true)
                    {
                        //category updated
                        $_SESSION['update']="<div class='success'>Category Updated Successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                    else{
                        //failed to updated
                        $_SESSION['update']="<div class='error'>Failed to Update Category.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                   
                }
            ?>
        </div>
    </div>
   <?php include('partials/footer.php'); ?>