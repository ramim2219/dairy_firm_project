<?php include '../connection.php'?>
<?php 
session_start();
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="../admin/admin.php";</script>
    <?php
}
else if($_SESSION['x']==2)
{
    ?>
        <script>window.location.href="feedback.php";</script>
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
$order_code = $_REQUEST['order_code'];
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
        include 'navbar.php';
    ?>
    <div class="container">
        <h1>Give Feedback</h1>
        <?php
            $s = "SELECT * FROM `feedbacktable` where 1";
            $q=mysqli_query($conn,$s);
            while($r=mysqli_fetch_array($q))
            {
                ?>
                    <form action="" class="container shadow p-3 mb-5 bg-body rounded" method="post">
                        <div class="form-group mb-3">
                            <label for="1">Order Code --- <?php echo $r['order_code']?></label>
                            <input type="text" name="order_code" class="form-control" value="<?php echo $r['order_code']?>" id="1" hidden>
                        </div>
                        <div class="form-group mb-3">
                            <label for="2">Sellers Feedback</label>
                            <input type="text" name="feedback" class="form-control" value="<?php echo $r['feedback']?>" id="2" disabled>
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="3">Staff's Reply</label>
                            <input type="text" name="reply" class="form-control" value="<?php echo $r['reply']?>" id="3">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php
            }
            if(isset($_POST['submitBtn'])){
                $order_code = $_POST['order_code'];
                $reply=$_POST['reply'];
                $str="UPDATE `feedbacktable` SET `reply`='$reply' WHERE `order_code`='$order_code'";
                if(mysqli_query($conn,$str))
                {
                    ?>
                        <script>alert("Reply given successfull!")</script>
                        <script>window.location.href="feedback.php"</script>
                    <?php
                }
                else
                {
                    ?>
                        <script>alert("unsuccessfull")</script>
                    <?php
                }
            }
        ?>
    </div>
</body>
</html>