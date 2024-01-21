<?php include '../connection.php';?>
<?php session_start(); 
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="update_seller.php";</script>
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
<body style="height:100%; padding-top:80px">
    <!-- navbar -->
    <!-- navbar -->
    <?php
        $userId = $_SESSION['id'];
        include 'navbar.php';
    ?>
    <div class="container">
        <?php
            $userId = $_REQUEST['userId'];
            $s="SELECT * FROM `sellertable` WHERE S_No=$userId";
            $q=mysqli_query($conn,$s);
            if($r=mysqli_fetch_assoc($q))
            {
                ?>
                    <form action="" class="container" method="post">
                        <div>
                            <h1>Edit Seller information</h1>
                        </div>
                        <div class="form-group">
                            <label for="1">Seller Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $r['S_Name']?>" id="1" >
                        </div>
                        <div class="form-group">
                            <label for="2">Seller Name</label>
                            <input type="text" name="user_id" class="form-control" value="<?php echo $r['user_id']?>" id="2" >
                        </div>
                        <div class="form-group">
                            <label for="3">Address</label>
                            <input type="text" name="adderss" class="form-control" value="<?php echo $r['Address']?>" id="3" >
                        </div>
                        <div class="form-group">
                            <label for="6">Phone number</label>
                            <input type="text" name="phoneNumber" class="form-control" value="<?php echo $r['Phone_No']?>" id="6" >
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php
                if(isset($_POST['submitBtn'])){
                $name=$_POST['name'];
                $address=$_POST['adderss'];
                $phoneNm=$_POST['phoneNumber'];
                    $str="UPDATE `sellertable` SET `S_Name`='$name',`Address`='$address',`Phone_No`='$phoneNm' WHERE S_No=$userId";
                    if(mysqli_query($conn,$str))
                    {
                        ?>
                            <script>alert("Information Updated")</script>
                            <script>window.location.href="manage_seller.php"</script>
                        <?php
                    }
                }
            }
        ?>
    </div>
</body>
</html>