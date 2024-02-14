<?php 
//include constant.php file here
    include ('../config/constants.php');

    //1. get the ID of admin to be deleted
    echo $id = $_GET['id'];

    //2. create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the query
     $res = mysqli_query($conn, $sql);

    //check whether query is executed successfully or not
   if($res == true)
   {
        //Query executed succesfully
        //echo "Admin Deleted";
        //Create Session variable to display message
        $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
     else{
        //failed to delete admin
        //echo "Failed to delete admin";
        $_SESSION['delete']=" <div class='error'>Failed to Deleted Admin. try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
     }

    //3. redirector to manage admin page witj message (success/failed)
?>