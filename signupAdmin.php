<?php include '../connection.php';?>
<?php session_start(); 
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="signupAdmin.php";</script>
    <?php
}
else if($_SESSION['x']==2)
{
    ?>
        <script>window.location.href="../staff/staff.php";</script>
    <?php
}
else if($_SESSION['x']==3)
{
    ?>
        <script>window.location.href="../seller/seller.php";</script>
    <?php
}
else
{
    ?>
        <script>window.location.href="../login.php";</script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../link.php'?>
</head>
<body style="height:100%; padding-top:56px">
    <!-- navbar -->
    <!-- navbar -->
    <?php
        $userId = $_SESSION['id'];
        include 'navbar.php';
    ?>
    <div>
        <div class="d-flex justify-content-center align-items-center mt-5 pt-5">
            <form class="shadow p-3 mb-5 bg-body-tertiary rounded w-75" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Admin Name</label>
                    <input type="text" class="form-control" name="user_name" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="user_password" class="form-control" id="pass">
                </div>
                <div class="mb-3">
                    <label for="conpass" class="form-label">Confirm Password</label>
                    <input type="password" name="user_conpassword" class="form-control" id="conpass">
                </div>
                <button type="submit" name="signupBtn" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['signupBtn'])){
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_conpassword=$_POST['user_conpassword'];
        $s="INSERT INTO `admintable`(`user_Id`, `user_pass`) VALUES ('$user_name','".md5($user_password)."')";
        if($user_conpassword==$user_password)
        {
            $q = mysqli_query($conn,$s);
            if($q)
            {
                ?> 
                    <script>
                        alert('inserted successfully');
                        window.location.href="admin.php"
                    </script> 
                <?php
            }
            else
            {
                ?> <script>alert('does not inserted successfully')</script> <?php
            }
        }
    }
?>