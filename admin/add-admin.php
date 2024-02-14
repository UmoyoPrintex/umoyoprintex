<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Create Admin</h1>
         <br><br>

            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //displaying session message
                    unset($_SESSION['add']); //removing session message
                    
                }

            ?>
        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Fullname: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name "></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Your Username "></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Your Password "></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Create Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
//Process the value from form into the dastabase

    //1. Check if the button is clicked
    if(isset($_POST['submit']))
    {
        //echo "clicked";

        //Get the data from the form
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $password = md5($_POST['password']); //Password encrypted with md5

        //SQL query to save data into the database
          $sql="INSERT INTO tbl_admin SET
             full_name ='$full_name',
             username ='$username',
             password ='$password'
          ";

        //echo $sql;
        //3. Executing the query and saving data into database
             $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        //Check whether the data is inserted or not
            if($res==TRUE)
            {
                //Data inserted
                //echo "Data Inserted";
                $_SESSION['add']="<div class='success'>Admin Created Successfully..</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else{
                //failed to insert data
                echo "Failed to insert Data";
                $_SESSION['add']="<div class='error'>Failed to Create Admin..</div>";
                header('location:'.SITEURL.'admin/add-admin.php');
            }

    }
?>

