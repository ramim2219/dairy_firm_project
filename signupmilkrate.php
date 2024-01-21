<?php include '../connection.php';?>
<?php session_start();
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="signupmilkrate.php";</script>
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
                    <label for="name" class="form-label">Cattle Animal Name</label>
                    <input type="text" class="form-control" name="user_name" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="fat" class="form-label">Fat</label>
                    <input type="number" step="0.01" class="form-control" name="fat" id="fat" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="rate" class="form-label">Rate</label>
                    <input type="number" step="0.01" class="form-control" name="rate" id="rate" aria-describedby="emailHelp">
                </div>
                <button type="submit" name="signupBtn" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['signupBtn'])){
        $name = $_POST['user_name'];
        $fat =$_POST['fat'];
        $rate = $_POST['rate'];
        $date  = date("Y/m/d");
        $s="INSERT INTO `milkratetable`(`Name`, `Fat`, `Rate`, `Udate`) VALUES ('$name','$fat','$rate','$date')";
        $q = mysqli_query($conn,$s);
        if($q)
        {
            ?> 
                <script>
                    alert('inserted successfully');
                    window.location.href="managemilkrate.php"
                </script> 
            <?php
        }
        else
        {
            ?> <script>alert('does not inserted successfully')</script> <?php
        }
    }
?>