<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br/><br/>

        <?php 
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        ?>

        <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Current Password:</td>
                        <td>
                            <input type="password" name="current_password" placeholder ="Current Password">
                        </td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td>
                            <input type="password" name="new_password" placeholder ="New Password">
                        </td>
                    </tr>
                    <tr>
                        <td>Conf Password:</td>
                        <td>
                            <input type="password" name="confirm_password" placeholder ="Confirm Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
    </div>
</div>


<?php 
//check whether submit button is clicked or not
if(isset($_POST['submit']))
{
    //echo "clocked";
    //1.get data fro form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //2. check whether user with current id and current password exist or not
    $sql ="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
    //Execute the query
    $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        //check whether data is available or not
        $count =mysqli_num_rows($res);
        if($count ==1)
        {
            //user exists and password can be changed
            //echo "user found";
            //check whether the new password and confirm password match
            if( $new_password == $confirm_password )
            {
                //update the password
                $sql2 ="UPDATE tbl_admin SET
                password ='$new_password'
                WHERE id=$id
                ";
                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //check whether query is executed succssfully or not
                if($res2 ==true)
                {
                    //display message
                    $_SESSION['change-pwd']="<div class='success'> Password Changed Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else{
                    //display error message
                    $_SESSION['pwd-not-match']="<div class='error'> Failed to Change Password.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else{
                //redirect to manage page with error message
                $_SESSION['pwd-not-match']="<div class='error'> Password does not match.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else{
            //user does not exists set messag and redirect
            $_SESSION['user-not-found']="<div class='error'>User mot found.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }

    }

    //3. check whether new password and confirm paswor fmatch or not
    //4. update password if all above is true
}
?>

    <!-- Calling the footer here -->
    <?php include('partials/footer.php'); ?>