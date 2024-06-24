<!-- menu.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, CSS links, and other head elements here -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.home') }}">JSON Sporty</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.about') }}">About</a>
                    </li>
                </ul>

                <!-- Check if user is authenticated -->
                @if(Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @if($cart && $cart->items->isNotEmpty())
                        <a href="{{ route('user.cart') }}" class="btn btn-outline-light me-2">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-light text-dark ms-1 rounded-pill">{{ $cart->items->count() }}</span>
                        </a>
                        @else
                        <a href="{{ route('user.cart') }}" class="btn btn-outline-light me-2">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-light text-dark ms-1 rounded-pill">0</span>
                        </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a href="/topup" class="btn btn-outline-light me-2">
                            <i class="bi bi-wallet-fill me-1"></i>
                            <small>Rp {{ Auth::user()->balance }}</small>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->username }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">See Profile</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="{{ route('user.purchaseHistory') }}">Purchase History</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.changePassword') }}">Change Password</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.changePin') }}">Change Pin</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
                @else
                <!-- If not authenticated, show login and signup buttons -->
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