<?php
 include('../config/constants.php');
?>

<html>
    <head>
        <title>Login - Umoyo Printex System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
                <br/><br/>

                <?php 
                 if(isset($_SESSION['login']))
                 {
                     echo $_SESSION['login']; //Displaying session message
                     unset($_SESSION['login']); //Removing session message
                 }

                 if(isset($_SESSION['no-login-message']))
                 {
                     echo $_SESSION['no-login-message']; //Displaying session message
                     unset($_SESSION['no-login-message']); //Removing session message
                 }

                ?>
                <br/><br/>

            <!-- login form starts here -->
            <form action="" method="POST" class="text-center">
                
                <label>Username</label><br>
                <input type="text" name="username" placeholder="Enter Username" required>
                <br><br>         

               <label>Password</label><br>
                <input type="password" name="password" placeholder="Enter Password" required>
               <br><br>
                <input type="submit" name="submit" value="Login Now" class="btn-primary">
                <br/><br/>
            </form>
            <!-- login form ends here -->

            <p class="text-center">Created by - <a href="#">Chamanga David</a></p>
        </div>
    </body>
</html>

<?php 

    //check whether the button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //1. gget the data from login form
        //$username =$_POST['username']; without security
        //$password = md5($_POST['password']); without security
        $username = mysqli_real_escape_string($conn, $_POST['username']); //with security

        $raw_password = md5($_POST['password']); //WIth Security
        $password = mysqli_real_escape_string($conn,$raw_password); //Secure

        //2. Create SQL to check whether user withusername exist or not
        $sql ="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3.Execute the query 
        $res =mysqli_query($conn,$sql);

        //Count rows to check whether the user exist or not
        $count =mysqli_num_rows($res);

        if($count ==1)
        {
                //user available and login success
                $_SESSION['login']="<div class='success'>Login Successful.. </div>";
                $_SESSION['user'] = $username;  //check if ueser is logged in or not

                //redirect to Home page/Dashboard
                header('location:'.SITEURL.'admin/');
        }
        else{
            //user not available and login fail
            $_SESSION['login']="<div class='error text-center'>Username or Password does not match!.. </div>";
            //redirect to Home page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }
?>