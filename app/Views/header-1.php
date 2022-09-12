<!-- css here -->
<style>
    header {
    background-color: #fff;
    box-shadow: 0px 0px 10px -3px #b3b3b3;
    padding: 10px 0px;
}
header .navbar-brand {
    max-width: 250px;
}
header .navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 12px;
    padding-left: 12px;
    font-size: 17px;
    color: #2f4f4f;
    font-weight: 500;
}
header .navbar-light .navbar-nav .active > .nav-link,
header .navbar-light .navbar-nav .nav-link.active,
header .navbar-light .navbar-nav .nav-link.show,
header .navbar-light .navbar-nav .show > .nav-link,
header .navbar-light .navbar-nav .nav-link:focus,
header .navbar-light .navbar-nav .nav-link:hover {
    color: #d93025;
}

header span.dropdown-toggle {
    position: absolute;
    top: 10px;
    right: 0px;
    font-size: 18px;
}
header .dropdown:hover span.dropdown-toggle {
    color: #d09c00;
}

@media (max-width: 576px) {
    header .navbar-brand {
        width: 160px;
    }
}
</style>

<!-- html here -->
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Kitchennete Store</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<!-- Bootstrap JS -->
  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="home">
                    <img src="images/logo.png" alt="logo" class="img-fluid" width="60" height="auto" />
                </a>
                <button class="navbar-toggler" 
                type="button" d
                ata-toggle="collapse" 
                data-target="#bs4navbar" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="bs4navbar">
                    <hr>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" href="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . "store";?>">Store Page</a>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Services</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo BASE_URL . "login";?>">Login</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL . "logout";?>">Logout</a>
                                <a class="dropdown-item" href="<?php echo BASE_URL . "registration";?>">Register</a>
                            </div>
                        </li>                           
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . "cart";?>">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> </a>
                        </li>                            
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header -->

</body>
</html>