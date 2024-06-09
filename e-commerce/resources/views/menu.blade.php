<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">JSON Sporty</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
    <li class="nav-item"><a class="nav-link" aria-current="page" href="/">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
    <!-- SHOP GA DIPAKE -->
    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#!">All Products</a></li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
        </ul>
    </li> -->
</ul>

<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a href="/cart" class="btn btn-outline-light">
            <i class="bi-cart-fill me-1"></i>
            Cart
            <span class="badge bg-light text-dark ms-1 rounded-pill">0</span>
        </a>
    </li>
    <li class="nav-item dropdown ms-3 me-3">
        <a href="/topup" class="btn btn-outline-light">
            <i class="bi bi-wallet-fill me-1"></i>
            Rp 20000
        </a>
    </li>   
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile">See Profile</a></li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="/purchaseHistory">Purchase History</a></li>
            <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
            <li><a class="dropdown-item" href="/changePin">Change Pin</a></li>
            <li><a class="dropdown-item text-danger" href="#!" data-bs-toggle="modal" data-bs-target="#confirmationToSignOut">Sign Out</a></li>
        </ul>
    </li>
</ul>
                </div>
            </div>
        </nav>
    </body>

    <div class="modal fade center" id="confirmationToSignOut" tabindex="-1" role="dialog" aria-labelledby="confirmationToSignOut" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationToSignOut">Signing Out?</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <div class="modal-body">
                    Are you want to sign out?
                </div> -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                    <a href="/signOut" class="btn btn-danger">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
</html>
 