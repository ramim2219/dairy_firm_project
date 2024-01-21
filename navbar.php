<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="../home.php"><img src="../image/logo.png" alt="" wifth="100px" height="100px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="signupSalesPerson.php">Seller Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="managemilkrate.php">Manage Milk Rate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Seller Milk Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item-dropdown">
                        <a href="#" class="nav-link dropdown-toggle second-text fx-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user me-2"></i><?php echo $name ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbar">
                            <li><a href="#" class="dropdown-item">Profile</a></li>
                            <li><a href="#" class="dropdown-item">Settings</a></li>
                            <li><a href="#" class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>