@extends('template')

@section('title')
Login
@endsection

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <div class="mb-md-5 mt-md-4 pb-5">

                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-white-50 mb-5">Please enter your email and password</p>
                        <form action="/login" method="POST">
                        @csrf
                        <div class="mb-4 text-start text-white">
                            <label class="form-label" for="typeEmailX">Email</label>
                            <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
                            @error('email')
                            <p class="text-danger">{{ $message }}</p> <!--ERROR MESSAGE-->
                            @enderror
                        </div>

                        <div class="mb-4 text-start text-white">
                            <label class="form-label" for="typePasswordX">Password</label>
                            <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" />
                            @error('password')
                            <p class="text-danger">{{ $message }}</p> <!--ERROR MESSAGE-->
                            @enderror
                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="/changePassword">Forgot password?</a></p>

                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                        <div class="d-flex justify-content-center text-center mt-4 pt-1">
                            <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                            <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                        </div>

                    </div>

                    <div>
                        <p class="mb-0">Don't have an account? <a href="/createAccount" class="text-white-50 fw-bold">Sign Up</a>
                        </p>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
