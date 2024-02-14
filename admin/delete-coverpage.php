<?php 
//include constant page
include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //process to delele
    //echo "process to delete";

    //1. get ID and Image name
    $id =$_GET['id'];
    $image_name =$_GET['image_name'];

    //2. remove the image if available
    //check whether image is available or not and delete only if available
    if($image_name!="")
    {
        //It has image and needs to be reomved from folder
        //get image path
        $path = "../images/slider-images/".$image_name;

        //Remove image file from folder
        $remove = unlink($path);

        //Check whether image is removed from folder or not
        if($remove ==false)
        {
            //failed to removed image
            $_SESSION['upload']="<div class='error'>Failed to Remove Image File. </div>";
            header("location:".SITEURL.'admin/manage-coverpage.php');
            //stop the process
            die();

        }
    }

    //3. Delete service from data
    $sql="DELETE FROM tbl_coverpage WHERE id=$id";
    //Execute the query
    $res=mysqli_query($conn,$sql);

    //check whether query executed success and display message
    //4. Redirect to manage service with session message
    if($res==true)
    {
        //service deleted
        $_SESSION['delete']="<div class='success'>Cover Page Has Been Deleted Successfully.</div>";
        header("location:".SITEURL.'admin/manage-coverpage.php');
    }
    else
    {
        //failed to dlete
        $_SESSION['delete']="<div class='error'>Failed to Delete Cover Page.</div>";
        header("location:".SITEURL.'admin/manage-coverpage.php');
    }
 
}
else{
    //redirect to manage service
    //echo "redirect";
    $_SESSION['unauthorized']="<div class='error'>Unauthorizied Access. </div>";
    header("location:".SITEURL.'admin/manage-coverpage.php');
}
?>