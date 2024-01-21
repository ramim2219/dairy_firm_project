<?php include '../connection.php'?>
<?php session_start();

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
        $s="SELECT * FROM `sellertable` WHERE user_id='$user_id'";
        $r=mysqli_fetch_assoc(mysqli_query($conn,$s));
        $name=$r['S_Name'];
        include 'navbar.php'
    ?>
    <div class="container">
        <?php
            $order_code = $_REQUEST['order_code'];
            $s = "SELECT * FROM `feedbacktable` WHERE order_code=$order_code";
            $q=mysqli_query($conn,$s);
            $r=mysqli_fetch_assoc($q);
            if($r)
            {
                ?>
                    <form action="" class="container" method="post">
                        <div>
                            <h1>Give feedback</h1>
                        </div>
                        <div class="form-group mb-3">
                            <label for="1">Order Code</label>
                            <input type="text" name="order_code" class="form-control" value="<?php echo $order_code?>" id="1" disabled>
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="3">Admin's reply</label>
                            <input type="text" name="reply" class="form-control" value="<?php echo $r['reply']?>" id="3" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="2">Write Your Experience</label>
                            <input type="text" name="feedback" class="form-control" value="<?php echo $r['feedback']?>" id="2" >
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php
            }
            else
            {
                ?>
                    <form action="" class="container" method="post">
                        <div>
                            <h1>Give feedback</h1>
                        </div>
                        <div class="form-group mb-3">
                            <label for="1">Order Code</label>
                            <input type="text" name="order_code" class="form-control" value="<?php echo $order_code?>" id="1" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="2">Write Your Experience</label>
                            <input type="text" name="feedback" class="form-control" value="" id="2" >
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php
            }
            if(isset($_POST['submitBtn'])){
                $feedback=$_POST['feedback'];
                if($r)
                {
                    $reply=$_POST['reply'];
                    $str="UPDATE `feedbacktable` SET `feedback`='$feedback' WHERE `order_code`='$order_code'";
                }
                else
                {
                    $str="INSERT INTO `feedbacktable`(`order_code`, `feedback`) VALUES ('$order_code','$feedback')";
                }
                if(mysqli_query($conn,$str))
                {
                    ?>
                        <script>alert("Feedback given successfull!")</script>
                        <script>window.location.href="sell_milk_details.php"</script>
                    <?php
                }
            }
        ?>
    </div>
</body>
</html>