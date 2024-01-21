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
        <script>window.location.href="viewmilkrate.php";</script>
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
        include 'navbar.php'
    ?>
    <div class="container">
        <h1>Milk Rate Information</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Fat</th>
                    <th scope="col">Rate (per liter)</th>
                    <th scope="col">Update date</th>
                    <th scope="col">Order Now</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $userId = $_SESSION['S_No'];
                    $s = "SELECT * FROM `milkRateTable` WHERE 1";
                    $q=mysqli_query($conn,$s);
                    $i=1;
                    while($r=mysqli_fetch_array($q))
                    {
                        $s_no = $r['S_NO'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><?php echo $r['Name'] ?></td>
                                <td><?php echo $r['Fat'] ?> %</td>
                                <td>৳ <?php echo $r['Rate'] ?></td>
                                <td><?php echo $r['Udate'] ?></td>
                                <td><a href="buymilk.php?milkId=<?php echo $s_no?>&userId=<?php echo $userId?>"><i class="fa-solid fa-cart-shopping"></i></a></td>
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