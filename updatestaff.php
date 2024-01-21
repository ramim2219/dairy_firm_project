<?php include '../connection.php';?>
<?php session_start(); 
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="updatestaff.php";</script>
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
            $userId = $_SESSION['id'];
            $s="SELECT * FROM `staff_table` WHERE S_No=$userId";
            $q=mysqli_query($conn,$s);
            if($r=mysqli_fetch_assoc($q))
            {
                ?>
                    <form action="" class="container" method="post">
                        <div>
                            <h1>Edit Staff information</h1>
                        </div>
                        <div class="form-group">
                            <label for="1">Staff Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $r['S_Name']?>" id="1" >
                        </div>
                        <div class="form-group">
                            <label for="2">Gender</label>
                            <input type="text" name="gender" class="form-control" value="<?php echo $r['Gender']?>" id="2" >
                        </div>
                        <div class="form-group">
                            <label for="3">Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $r['Address']?>" id="3" >
                        </div>
                        <div class="form-group">
                            <label for="4">Position</label>
                            <input type="text" name="position" class="form-control" value="<?php echo $r['Work']?>" id="4" >
                        </div>
                        <div class="form-group">
                            <label for="5">Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $r['Salary']?>" id="5" >
                        </div>
                        <div class="form-group">
                            <label for="6">Phone number</label>
                            <input type="text" name="ph_nmbr" class="form-control" value="<?php echo $r['Phone_No']?>" id="6" >
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php
                if(isset($_POST['submitBtn'])){
                    $name=$_POST['name'];
                    $gender=$_POST['gender'];
                    $address=$_POST['address'];
                    $position=$_POST['position'];
                    $salary=$_POST['salary'];
                    $ph_nmbr=$_POST['ph_nmbr'];
                    $str="UPDATE `staff_table` SET `S_Name`='$name',`Gender`='$gender',`Address`='$address',`Work`='$position',`Salary`='$salary',`Phone_No`='$ph_nmbr' WHERE `S_No`=$userId";
                    if(mysqli_query($conn,$str))
                    {
                        ?>
                            <script>alert("Information Updated")</script>
                            <script>window.location.href="manage_staff.php"</script>
                        <?php
                    }
                }
            }
        ?>
    </div>
</body>
</html>