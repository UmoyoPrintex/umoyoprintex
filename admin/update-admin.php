<?php include('partials/menu.php'); ?>

<div class="main-content">
        <div class="wrapper">
            <h1> Update Admin</h1>
            <br/><br/>

            <?php 
                //1. get the ID of select admin
                $id = $_GET['id'];

                //2. Create Sql to get the details
                $sql = "SELECT * FROM tbl_Admin WHERE id=$id";

                //3. Execute the query
                $res = mysqli_query($conn, $sql);

                //4. check whether query ie executed or not
                if($res ==true)
                {
                    //check whether data is available or not
                    $count = mysqli_num_rows($res);
                    //check whether we have admin data or not
                    if($count==1)
                    {
                        //get the details
                        //echo "admin available";
                        $row=mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    }
                    else{
                        //redirect to manage admin page
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
            ?>

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Fullname:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>

<?php 
//check whether button is clicked or not
if(isset($_POST['submit']))
{
    //echo "Button is clicked";
    //get all the values from the form to update
    //mysqli_real_escape_string -security to prevent hacks from input fields
   $id = mysqli_real_escape_string($conn, $_POST['id']);
   $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);

   //create sql query to update admin
   $sql ="UPDATE tbl_admin SET
   full_name ='$full_name',
   username ='$username' 
   WHERE id='$id'
   ";

   //Exdcute the query
   $res = mysqli_query($conn, $sql);

   //check whether query is executed succssfully or not
   if($res==true)
   {
    //query exectued and admin updated
    $_SESSION['update']="<div class='success'>Admin Updated Successfully.</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
   }
   else{
    //failed to update admin
    $_SESSION['update']="<div class='error'>Failed to Update Admin.</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
   }
}

?>

   <!-- Calling the footer here -->
   <?php include('partials/footer.php'); ?>