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
        <script>window.location.href="updatemilkdetail.php";</script>
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
<body style="height:100%; padding-top:80px">
    <!-- navbar -->
    <!-- navbar -->
    <?php
        $user_id=$_SESSION['id']; 
        $s="SELECT S_Name FROM `staff_table` WHERE user_id='$user_id'";
        $r=mysqli_fetch_assoc(mysqli_query($conn,$s));
        $name=$r['S_Name'];
        include 'navbar.php'
    ?>
    <div class="container">
        <?php
            $userId = $_REQUEST['userId'];
            $s="SELECT * FROM `milkRateTable` WHERE S_No=$userId";
            $q=mysqli_query($conn,$s);
            if($r=mysqli_fetch_assoc($q))
            {
                ?>
                    <form action="" class="container" method="post">
                        <div>
                            <h1>Edit milk rate information</h1>
                        </div>
                        <div class="form-group mb-2">
                            <label for="1">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $r['Name']?>" id="1" >
                        </div>
                        <div class="form-group mb-2">
                            <label for="4">Fat</label>
                            <input type="number" name="fat" class="form-control" step="0.01" value="<?php echo $r['Fat']?>" id="4" >
                        </div>
                        <div class="form-group mb-2">
                            <label for="5">Rate</label>
                            <input type="number" step="0.01" name="rate" class="form-control" value="<?php echo $r['Rate']?>" id="5" >
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php
                if(isset($_POST['submitBtn'])){
                    $date= date("Y/m/d");
                    $name=$_POST['name'];
                    $fat=$_POST['fat'];
                    $rate=$_POST['rate'];
                    $str="UPDATE `milkRateTable` SET `Name`='$name',`Fat`='$fat',`Rate`='$rate',`Udate`='$date' WHERE S_NO=$userId";
                    if(mysqli_query($conn,$str))
                    {
                        ?>
                            <script>alert("Information Updated")</script>
                            <script>window.location.href="managemilkrate.php"</script>
                        <?php
                    }
                }
            }
        ?>
    </div>
</body>
</html>