@extends('template')

@section('title', 'Profile')

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
                <form method="POST" action="{{ route('user.updateProfile') }}" class="form-container" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mt-5">
                        <h4 class="card-title mb-4"><b>Hi, {{ $User->username }}</b></h4>

                        <!-- Username -->
                        <div class="mb-4">
                            <h5 class="form-label opacity-75"><strong>Username</strong></h5>
                            <input type="text" class="form-control" name="username" id="username" value="{{ $User->username }}" readonly>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <h5 class="form-label opacity-75"><strong>Email</strong></h5>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $User->email }}" readonly>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <h5 class="form-label opacity-75"><strong>Phone Number</strong></h5>
                            <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber', $User->phone_number) }}">
                            @error('phoneNumber')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <h5 class="form-label opacity-75"><strong>Address:</strong></h5>

                            <!-- Province -->
                            <div class="mb-3">
                                <label for="province" class="form-label opacity-75"><strong>Province</strong></label>
                                <select class="form-control @error('province') is-invalid @enderror" name="province" id="province">
                                    @foreach($provinces as $province)
                                        <option value="{{ $province }}" {{ old('province', $User->address_province) == $province ? 'selected' : '' }}>{{ $province }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- City -->
                            <div class="mb-3">
                                <label for="city" class="form-label opacity-75"><strong>City</strong></label>
                                <select class="form-control @error('city') is-invalid @enderror" name="city" id="city">
                                    @foreach($cities[$User->address_province] as $city)
                                        <option value="{{ $city }}" {{ old('city', $User->address_city) == $city ? 'selected' : '' }}>{{ $city }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Detail Street -->
                            <div class="mb-3">
                                <label for="detailStreet" class="form-label opacity-75"><strong>Detail Street</strong></label>
                                <input type="text" class="form-control @error('detailStreet') is-invalid @enderror" name="detailStreet" id="detailStreet" value="{{ old('detailStreet', $User->address_street) }}">
                                @error('detailStreet')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Postal Code -->
                            <div class="mb-3">
                                <label for="postalCode" class="form-label opacity-75"><strong>Postal Code</strong></label>
                                <input type="text" class="form-control @error('postalCode') is-invalid @enderror" name="postalCode" id="postalCode" value="{{ old('postalCode', $User->address_postal_code) }}">
                                @error('postalCode')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Buttons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-success me-md-2">Save Profile</button>
                                <a href="/profile" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const city = @json($cities);
    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city');

    function pilihanCity() {
        const selectedProvince = provinceSelect.value;
        const selectedCities = city[selectedProvince] || [];

        citySelect.innerHTML = '';

        selectedCities.forEach(city => {
            const option = document.createElement('option');
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        });
    }

    provinceSelect.addEventListener('change', function() {
        pilihanCity();
    });

    document.addEventListener('DOMContentLoaded', function() {
        pilihanCity();
    });
</script>
@endsection
