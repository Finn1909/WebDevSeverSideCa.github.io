

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">

<div id="main-wrapper">
    <div style="text-align: center;">
        <h2>Home Page</h2>
        <h3>Welcome
            <?php echo $_SESSION['username'] ?>
        </h3>
        <p> More Info Being Added Soon!!!</p>

    </div>

    <form class="myform" action="homepage.php" method="post">
        <input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>

    </form>

    <?php
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location:index.php');
    }
    ?>
</div>
</body>
</html>