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
    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mb-5">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card bg-dark text-white" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form action="{{ url('/register') }}" method="POST">
                                @csrf
                                <div class="mb-4 text-white">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control form-control-lg" required />
                                    @error('username')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                    @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                    @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="password_confirmation">Repeat your password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" required />
                                    @error('password_confirmation')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="phone_number">Phone Number</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control form-control-lg" required />
                                    @error('phone_number')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="pin">Pin</label>
                                    <input type="password" id="pin" name="pin" class="form-control form-control-lg" required />
                                    @error('pin')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="pin_confirmation">Repeat your pin</label>
                                    <input type="password" id="pin_confirmation" name="pin_confirmation" class="form-control form-control-lg" required />
                                    @error('pin_confirmation')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>


                                <h4 class="text-white">Address :</h4>
                                <div class="mb-4 text-white">
                                    <label class="form-label" for="address_street">Street</label>
                                    <input type="text" id="address_street" name="address_street" class="form-control form-control-lg" required />
                                    @error('address_street')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="city">City</label>
                                    <input type="text" id="address_city" name="address_city" class="form-control form-control-lg" required />
                                    @error('address_city')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="address_province">Province</label>
                                    <select id="address_province" name="address_province" class="form-select form-select-lg text-black" required>
                                        <option value="">Select Province</option>
                                        @foreach($provinces as $province)
                                        <option value="{{ $province }}">{{ $province }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="postal_code">Postal Code</label>
                                    <input type="text" id="postal_code" name="postal_code" class="form-control form-control-lg" required />
                                    @error('postal_code')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-light btn-lg px-5">Register</button>
                                </div>

                                <p class="text-center text-white mt-5 mb-0">Have already an account? <a href="\login" class="text-white-50 fw-bold"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
