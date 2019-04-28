<?php
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

    </script>
</head>
<body style="background-color:#bdc3c7">

<form class="myform" action="register.php"method="post" enctype="multipart/form-data" >
    <div id="main-wrapper">
        <div style="text-align: center;">
            <h2>Registration Form</h2>
            <img src="imgs/avatar.png" class="avatar"/>

        </div>
        <label><b>Username:</b></label><br>
        <input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
        <label><b>Password:</b></label><br>
        <input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
        <label><b>Confirm Password:</b></label><br>
        <input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
        <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
        <a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
</form>

<?php
if(isset($_POST['submit_btn']))
{


    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];



    $directory = 'uploads/';


    if($password==$cpassword)
    {

        $query= "select * from fileuploadtable WHERE username='$username'";
        $query_run = mysqli_query($con,$query);

        if(mysqli_num_rows($query_run)>0)
        {
            // there is already a user with the same username
            echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
        }

        else
        {

            $query= "insert into fileuploadtable values('','$username','$password')";
            $query_run = mysqli_query($con,$query);

            if($query_run)
            {
                echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("Error!") </script>';
            }
        }


    }
    else
    {
        echo '<script type="text/javascript"> alert("Password and confirm password does not match!")</script>';
    }




}
?>
</div>
</body>
</html>