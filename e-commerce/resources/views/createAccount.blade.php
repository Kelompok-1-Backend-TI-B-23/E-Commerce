@extends('template')

@section('title')
createAccount
@endsection

@section('content')
<div class="mw6 center pa3 sans-serif">
    <h1 class="mb4">Create Account</h1>
    <form action="/createAccount" method="POST">
        @csrf
        <div class="mb3">
            <label for="username" class="db mb2">Username</label>
            <input type="text" name="username" id="username" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
            @error('username')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <label for="email" class="db mb2">Email</label>
            <input type="email" name="email" id="email" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <label for="password" class="db mb2">Password</label>
            <input type="password" name="password" id="password" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <label for="password_confirmation" class="db mb2">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
        </div>
        <div class="mb3">
            <label for="pin" class="db mb2">PIN</label>
            <input type="password" name="pin" id="pin" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
            @error('pin')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <label for="pin_confirmation" class="db mb2">Confirm PIN</label>
            <input type="password" name="pin_confirmation" id="pin_confirmation" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
        </div>
        <div class="mb3">
            <label for="phone_number" class="db mb2">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
            @error('phone_number')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <label for="address_province" class="db mb2">Province</label>
            <select name="address_province" id="address_province" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
                <option value="">Select Province</option>
                @foreach($provinces as $province)
                <option value="{{ $province }}">{{ $province }}</option>
                @endforeach
            </select>
            @error('address_province')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <label for="address_city" class="db mb2">City</label>
            <select name="address_city" id="address_city" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
                <option value="">Select City</option>
            </select>
            @error('address_city')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <label for="address_street" class="db mb2">Street Address</label>
            <input type="text" name="address_street" id="address_street" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
            @error('address_street')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <label for="address_postal_code" class="db mb2">Postal Code</label>
            <input type="text" name="address_postal_code" id="address_postal_code" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
            @error('address_postal_code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb3">
            <button type="submit" class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6">Create Account</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cities = @json($cities);
        const provinceSelect = document.getElementById('address_province');
        const citySelect = document.getElementById('address_city');

        provinceSelect.addEventListener('change', function () {
            const selectedProvince = this.value;
            const citiesForProvince = cities[selectedProvince] || [];

            citySelect.innerHTML = '<option value="">Select City</option>';

            citiesForProvince.forEach(function (city) {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                citySelect.appendChild(option);
            });
        });
    });
</script>
@endsection