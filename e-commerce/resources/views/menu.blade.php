<!-- menu.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, CSS links, and other head elements here -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">JSON Sporty</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                </ul>

                <!-- Kalau login maka muncul cart wallet dan profile -->
                @if(!request()->is('login') && !request()->is('createAccount'))
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/cart" class="btn btn-outline-light me-2">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-light text-dark ms-1 rounded-pill">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/topup" class="btn btn-outline-light me-2">
                            <i class="bi bi-wallet-fill me-1"></i>
                            Rp 20000
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profile">See Profile</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="/purchaseHistory">Purchase History</a></li>
                            <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                            <li><a class="dropdown-item" href="/changePin">Change Pin</a></li>
                            <li><a class="dropdown-item text-danger" href="#!" data-bs-toggle="modal" data-bs-target="#confirmationToSignOut">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Kalau belum login atau lagi create account maka tidak ada tombol wallet cart dan profile -->
                @elseif(request()->is('login') || request()->is('createAccount'))
                <ul class="navbar-nav">
                    <li class="nav-item me-2">
                        <a href="/login" class="btn btn-outline-light">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/createAccount" class="btn btn-outline-light">Sign Up</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
</body>
</html>
