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
        <script>window.location.href="../staff/staff.php";</script>
    <?php
}
else if($_SESSION['x']==3)
{
    ?>
        <script>window.location.href="buymilk.php";</script>
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
<body style="height:100%; padding-top:150px">
    <!-- navbar -->
    <!-- navbar -->
    <?php 
        $user_id=$_SESSION['id']; 
        $s="SELECT * FROM `sellertable` WHERE user_id='$user_id'";
        $r=mysqli_fetch_assoc(mysqli_query($conn,$s));
        $name=$r['S_Name'];
        include 'navbar.php';
    ?>
    <?php
        $milkId = $_REQUEST['milkId'];
        $userId = $_REQUEST['userId'];
        $s = "SELECT * FROM `milkRateTable` WHERE S_NO=$milkId";
        $q=mysqli_query($conn,$s);
        if($r=mysqli_fetch_assoc($q))
        {
            ?>
                <form action="" class="container" method="post">
                    <div>
                        <h1>Order now</h1>
                    </div>
                    <div class="form-group mb-3">
                        <label for="1">Cattle Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $r['Name']?>" id="1" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="2">Fat</label>
                        <input type="number" name="fat" class="form-control" value="<?php echo $r['Fat'] ?>" id="2" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="2">Quantity (Liter)</label>
                        <input type="number" step="0.01" name="qnty" class="form-control" value="1" id="2" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="3">Rate</label>
                        <input type="text" name="rate" class="form-control" value="<?php echo $r['Rate']?>" id="3" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            <?php
            if(isset($_POST['submitBtn'])){
                $name = $r['Name'];
                $fat = $r['Fat'];
                $quantity = $_POST['qnty'];
                $rate = $r['Rate'];
                $due = $quantity * $rate ; 
                $str = "INSERT INTO `buymilkdetail`(`milkid_no`, `user_id`, `rate`, `quantity`, `due`) VALUES ('$milkId','$userId','$rate','$quantity','$due')";
                $q=mysqli_query($conn,$str);
                if($q)
                {
                    ?>
                        <script>alert("Request Successfull!")</script>
                        <script>window.location.href="viewmilkrate.php"</script> 
                    <?php
                }
            }
        }
    ?>
</body>
</html>