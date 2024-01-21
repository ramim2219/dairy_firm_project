<?php include 'connection.php'?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php'?>
</head>
<body style="height:100%; padding-top:56px;">
    <!-- navbar -->
    <!-- navbar -->
    <?php include 'navbar.php'?>
    <div class="mt-4" style="background-image: url('image/background.png');background-size:cover;min-height:110vh;">
        <div class="color-overlay d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="d-flex justify-content-center align-items-center mt-5 pt-5">
                <form class="shadow p-3 mb-5 bg-body-tertiary rounded" method="post">
                    <div class="mb-3 d-flex justify-content-center">
                        <p>Login As Sales Person</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="user" class="form-label">User Id</label>
                        <input type="text" class="form-control" name="user_id" id="user" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your Id with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" name="user_password" class="form-control" id="pass">
                    </div>
                    <button type="submit" name="loginBtn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="my-0">
        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <!-- End of .container -->
</body>
</html>
<?php 
    if(isset($_POST['loginBtn'])){
        $userId = $_POST['user_id'];
        $password = $_POST['user_password'];
        $s = "select * from sellertable where user_id='".$userId."' 
        and pass='".md5($password)."'";
        $q = mysqli_query($conn, $s);
        $r=mysqli_fetch_assoc($q);
        if($r)
        {
            $_SESSION['x']=3;
            $_SESSION['id']=$userId;
            $_SESSION['S_No']=$r['S_No'];
            ?> 
                <script>alert("Login Successfull!")</script>
                <script>window.location.href="seller/seller.php"</script>
            <?php
        }
        else
        {
            ?>
                <script>alert("USername or password are not matched\nTry again!")</script>
            <?php
        }
    }
?>
