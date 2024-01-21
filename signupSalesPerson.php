<?php include '../connection.php';?>
<?php session_start(); 
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="../admin/admin.php";</script>
    <?php
}
else if($_SESSION['x']==2)
{
    ?>
        <script>window.location.href="signupSalesPerson.php";</script>
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
        $user_id=$_SESSION['id']; 
        $s="SELECT S_Name FROM `staff_table` WHERE user_id='$user_id'";
        $r=mysqli_fetch_assoc(mysqli_query($conn,$s));
        $name=$r['S_Name'];
        include 'navbar.php'
    ?>
    <div>
        <div class="d-flex justify-content-center align-items-center mt-5 pt-5">
            <form class="shadow p-3 mb-5 bg-body-tertiary rounded w-75" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Sales Person Name</label>
                    <input type="text" class="form-control" name="user_name" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">User id</label>
                    <input type="text" class="form-control" name="user_id" id="user_id" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="user_address" id="user_address" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="user_phonenumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="user_phonenumber" id="user_phonenumber" aria-describedby="emailHelp">
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
        $user_id = $_POST['user_id'];
        $user_address = $_POST['user_address'];
        $user_phonenumber = $_POST['user_phonenumber'];
        $user_password = $_POST['user_password'];
        $date  = date("Y/m/d");
        $user_conpassword=$_POST['user_conpassword'];
        $str="select * from sellertable where user_id='$user_id'";
        if(mysqli_num_rows(mysqli_query($conn,$str))>0)
        {
            ?>
                <script>alert("user id is already exist\nTry again!")</script>
            <?php
        }
        else
        {
            $s="INSERT INTO `sellertable`(`S_Name`, `Address`,`user_id`,`R_Date`, `Phone_No`, `pass`) VALUES ('$user_name','$user_address','$user_id','$date','$user_phonenumber','".md5($user_password)."')";
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
    }
?>