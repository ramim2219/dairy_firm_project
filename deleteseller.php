<?php
include '../connection.php';
$userId = $_REQUEST['userId'];
$s="DELETE FROM `sellertable` WHERE S_No=$userId";
$q=mysqli_query($conn,$s);
if($s)
{
    ?>
        <script>alert("Deleted successfully!")</script>
        <script>window.location.href="manage_seller.php"</script>
    <?php
}
?>