<?php include '../connection.php'?>
<?php 
session_start(); 
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="admin.php";</script>
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
        <h1>Admin page</h1>
    </div>
</body>
</html>