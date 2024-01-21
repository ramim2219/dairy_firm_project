<?php include '../connection.php'?>
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
        <script>window.location.href="staff.php";</script>
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
<body style="height:100%; padding-top:100px">
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
        <h1>This is staff page</h1>
    </div>
</body>
</html>