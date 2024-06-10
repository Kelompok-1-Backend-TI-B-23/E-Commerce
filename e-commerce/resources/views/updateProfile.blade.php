@extends ('template')

@section('title')
    Profile
@endsection

@section('navigation')
<ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
    <li class="nav-item"><a class="nav-link" aria-current="page" href="/">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#!">All Products</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
        </ul>
    </li>
</ul>

<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a href="/cart" class="btn btn-outline-light">
            <i class="bi-cart-fill me-1"></i>
            Cart
            <span class="badge bg-light text-dark ms-1 rounded-pill">0</span>
        </a>
    </li>    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile">See Profile</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#!">Change Password</a></li>
            <li><a class="dropdown-item" href="#!">Change Pin</a></li>
            <li><a class="dropdown-item text-danger" href="#!" data-bs-toggle="modal" data-bs-target="#confirmationToSignOut">Sign Out</a></li>
        </ul>
    </li>
</ul>
@endsection

@section('content')
<div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
                <div class="card-body">
                    <form method="POST" action="" class="form-container" enctype="multipart/form-data">
                            @method("PUT")
                            {{ csrf_field() }}
                    <div class="mt-5 form-container">
                        <div>
                            <h4 class="card-title mb-4"><b>Hi, Nama</b></h4>
                        </div>

                        <!-- Username -->
                        <div class="mb-4">
                            <h5 class="form-label opacity-75"><strong>Username</strong></h5>
                            <input type="text" class="form-control" name="username" id="username" value="Ini Valuenya dari DB">
                            <small class="text-danger">INI UTK ERROR MSG</small>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <h5 class="form-label opacity-75"><strong>Email</strong></h5>
                            <input type="text" class="form-control" name="email" id="email" value="Ini Valuenya dari DB">
                            <small class="text-danger">INI UTK ERROR MSG</small>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <h5 class="form-label opacity-75"><strong>Phone Number</strong></h5>
                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="Ini Valuenya dari DB">
                            <small class="text-danger">INI UTK ERROR MSG</small>
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <h5 class="form-label opacity-75"><strong>Address:</strong></h5>
                            
                            <!-- Province -->
                            <div>
                                <label for="province" class="form-label opacity-75 pb-0 mb-0"><strong>Province</strong></label>
                                <input type="text" class="form-control" name="province" id="province" value="Ini Valuenya dari DB">
                                <small class="text-danger">INI UTK ERROR MSG</small>
                            </div>

                            <!-- City -->
                            <div>
                                <label for="city" class="form-label opacity-75 pb-0 mb-0"><strong>City</strong></label>
                                <input type="text" class="form-control" name="city" id="city" value="Ini Valuenya dari DB">
                                <small class="text-danger">INI UTK ERROR MSG</small>
                            </div>

                            <!-- Detail Street -->
                            <div>
                                <label for="detailStreet" class="form-label opacity-75 pb-0 mb-0"><strong>Detail Street</strong></label>
                                <input type="text" class="form-control" name="detailStreet" id="detailStreet" value="Ini Valuenya dari DB">
                                <small class="text-danger">INI UTK ERROR MSG</small>
                            </div>

                            <!-- Postal Code -->
                            <div>
                                <label for="postalCode" class="form-label opacity-75 pb-0 mb-0"><strong>Postal Code</strong></label>
                                <input type="text" class="form-control" name="postalCode" id="postalCode" value="Ini Valuenya dari DB">
                                <small class="text-danger">INI UTK ERROR MSG</small>
                            </div>
                        </div>

                        <div class="dark-mode float-end my-3">
                            <button type="submit" class="btn btn-dark">Save Profile</button>
                            <a href="/profile" class="btn btn-danger ms-3">Cancel</a>
                        </div>
                    </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection