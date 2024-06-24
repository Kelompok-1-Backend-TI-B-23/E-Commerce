<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your meta tags, CSS links, and other head elements here -->
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Tampilkan JSON Sporty untuk semua pengguna kecuali admin -->
            @if(!(Auth::check() && Auth::user()->role === 'admin'))
                <a class="navbar-brand" href="{{ route('user.home') }}">JSON Sporty</a>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Tampilkan Home dan About untuk semua pengguna kecuali admin -->
                    @if(!(Auth::check() && Auth::user()->role === 'admin'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.about') }}">About</a>
                        </li>
                    @endif
                </ul>

                @if(Auth::check())
                    <!-- Check user role -->
                    @if(Auth::user()->role === 'admin')
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light me-2">Admin Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->username }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#confirmationToSignOut">Sign Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        <!-- Regular user-specific features -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/cart" class="btn btn-outline-light me-2">
                                    <i class="bi-cart-fill me-1"></i>
                                    Cart
                                    <span class="badge bg-light text-dark ms-1 rounded-pill">0</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.topup') }}" class="btn btn-outline-light me-2">
                                    <i class="bi bi-wallet-fill me-1"></i>
                                    <small>Rp {{ number_format(Auth::user()->balance, 0, ',', '.') }}</small>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->username }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">See Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('user.purchaseHistory') }}">Purchase History</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.changePassword') }}">Change Password</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.changePin') }}">Change Pin</a></li>
                                    <li><a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#confirmationToSignOut">Sign Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif
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
    <div class="modal fade center" id="confirmationToSignOut" tabindex="-1" role="dialog" aria-labelledby="confirmationToSignOut" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationToSignOut">Signing Out?</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>