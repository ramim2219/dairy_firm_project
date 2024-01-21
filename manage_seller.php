<?php include '../connection.php';?>
<?php session_start();
if($_SESSION['x']==1)
{
    ?>
        <script>window.location.href="manage_seller.php";</script>
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
<body style="height:100%; padding-top:150px">
    <!-- navbar -->
    <!-- navbar -->
    <?php
        $userId = $_SESSION['id'];
        include 'navbar.php';
    ?>
    <div class="container">
        <h1>Seller Information</h1>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Seller Name</th>
                <th scope="col">User id</th>
                <th scope="col">Address</th>
                <th scope="col">Phone number</th>
                <th scope="col">Registration date</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $s = "SELECT * FROM `sellertable` WHERE 1";
                $q=mysqli_query($conn,$s);
                $i=1;
                while($r=mysqli_fetch_array($q))
                {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $r['S_Name'] ?></td>
                            <td><?php echo $r['user_id'] ?></td>
                            <td><?php echo $r['Address'] ?></td>
                            <td><?php echo $r['Phone_No'] ?></td>
                            <td><?php echo $r['R_Date'] ?></td>
                            <td><a href="update_seller.php?userId=<?php echo $r['S_No'] ?>" class="btn btn-success" type="submit" name="student_approve"><i class="fa-solid fa-gear"></i></a></td>
                            <td><a href="deleteseller.php?userId=<?php echo $r['S_No'] ?>" onclick="return confirm('Are you sure you want to delete.')" rel="noopener" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
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