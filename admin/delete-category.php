<?php 
//Inlcude constant file
include('../config/constants.php');


//echo "Delete page";
//Check whether the ID and image_name is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //Get the value and delete
    //echo "Get value and delete";
    $id = $_GET['id'];
    $image_name =$_GET['image_name'];

    //Remove the physical image file if available
    if($image_name!="")
    {
        //image available, so remove it
        $path = "../images/category/".$image_name;
        //Remove the image
        $remove =unlink($path);

        //if fail to remove image then add an error message and stop proccess
        if($remove==false)
        {
            //Set session message
            $_SESSION['remove']="<div class='error'>Failed to Remove Category Image. </div>";
            //redirect to manage-category page
            header("location:".SITEURL.'admin/manage-category.php');
            //stop the process
            die();
        }
    }

    //Delete data from database
    //SQL delete data from database
    $sql ="DELETE FROM tbl_category WHERE id=$id";

    //EXecute the query
    $res=mysqli_query($conn,$sql);

    //Checj if data is deleted from database or not
    if($res==true)
    {
        //set success message and redirect
        $_SESSION['delete']="<div class='success'>Category Deleted Successfully.</div>";
        //redirect to manage-category
        header("location:".SITEURL.'admin/manage-category.php');
    }
    else{
        //set failed message and redirect
        $_SESSION['delete']="<div class='error'>Failed to Delete Category.</div>";
        //redirect to manage-category
        header("location:".SITEURL.'admin/manage-category.php');
    }

  

}
else{
    //Redirect to manage category page
    header("location:".SITEURL.'admin/manage-category.php');
}

?>