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
        <script>window.location.href="../staff/staff.php";</script>
    <?php
}
else if($_SESSION['x']==3)
{
    ?>
        <script>window.location.href="sell_milk_details.php";</script>
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
        $s="SELECT * FROM `sellertable` WHERE user_id='$user_id'";
        $r=mysqli_fetch_assoc(mysqli_query($conn,$s));
        $name=$r['S_Name'];
        include 'navbar.php'
    ?>
    <div class="container">
        <h1>Staff Information</h1>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order Code</th>
                <th scope="col">Animal cattle</th>
                <th scope="col">Rate</th>
                <th scope="col">Quantity</th>
                <th scope="col">Due</th>
                <th scope="col">Order date</th>
                <th scope="col">Payment status</th>
                <th scope="col">Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $userId = $_SESSION['S_No'];
                $s = "SELECT 
                b.S_NO as order_code,
                m.Name as cattle_name,
                b.rate as rate, 
                b.quantity as quantity,
                b.due as due,
                b.order_date as order_date,
                b.status as payment_status
                FROM buymilkdetail as b inner join milkratetable as m
                on b.milkid_no=m.S_NO
                where b.user_id=$userId";
                $q=mysqli_query($conn,$s);
                $i=1;
                while($r=mysqli_fetch_array($q))
                {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $r['order_code'] ?></td>
                            <td><?php echo $r['cattle_name'] ?></td>
                            <td><?php echo $r['rate'] ?></td>
                            <td><?php echo $r['quantity'] ?></td>
                            <td><?php echo $r['due'] ?></td>
                            <td><?php echo $r['order_date'] ?></td>
                            <td>
                                <?php
                                    if($r['payment_status']==0)
                                    {
                                        ?>
                                            <a href="" class="btn btn-danger disabled" >Unpaid</a>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <a href="" class="btn btn-success disabled">Paid</a>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td><a href="give_feedback.php?order_code=<?php echo $r['order_code'] ?>" class="btn btn-success">Give Feedback</a></td>
                        </tr>
                    <?php
                    $i++;
                }
            ?>
        </tbody>
        </table>
    </div>
</body>
</html>