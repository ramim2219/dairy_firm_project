<?php include '../connection.php';?>
<?php session_start();
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="signupStuff.php";</script>
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
                    <label for="name" class="form-label">Staff Name</label>
                    <input type="text" class="form-control" name="user_name" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">User id</label>
                    <input type="text" class="form-control" name="user_id" id="user_id" aria-describedby="emailHelp">
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="selectGender" id="inlineRadio1" value="Male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="selectGender" id="inlineRadio2" value="Female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="mb-3">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="user_address" id="user_address" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="user_work" class="form-label">Work</label>
                    <input type="text" class="form-control" name="user_work" id="user_work" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="user_salary" class="form-label">Salary</label>
                    <input type="text" class="form-control" name="user_salary" id="user_salary" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="user_phonenumber" id="user" aria-describedby="emailHelp">
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
        $user_id=$_POST['user_id'];
        $selectGender = $_POST['selectGender'];
        $user_address = $_POST['user_address'];
        $user_work = $_POST['user_work'];
        $user_salary = $_POST['user_salary'];
        $user_phonenumber = $_POST['user_phonenumber'];
        $user_password = $_POST['user_password'];
        $date  = date("Y/m/d");
        $user_conpassword=$_POST['user_conpassword'];
        $str="select * from `staff_table` where user_id='$user_id'";
        if(mysqli_num_rows(mysqli_query($conn,$str))>0)
        {
            ?>
                <script>alert("user id is already exist\nTry again!")</script>
            <?php
        }
        else
        {
            $s="INSERT INTO `staff_table`(`S_Name`, `Gender`,`user_id`,`Address`, `Work`, `Salary`, `Phone_No`, `R_Date`,`user_pass`) VALUES ('$user_name','$selectGender','$user_id','$user_address','$user_work ','$user_salary','$user_phonenumber','$date','".md5($user_password)."')";
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