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

                            <form>
                                <div class="mb-4 text-white">
                                    <label class="form-label" for="form3Example1cg">Username</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                                    <small class="text-danger">INI UTK ERROR MSG</small>
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="form3Example3cg">Email</label>
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                                    <small class="text-danger">INI UTK ERROR MSG</small>
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                                    <small class="text-danger">INI UTK ERROR MSG</small>
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                                    <small class="text-danger">INI UTK ERROR MSG</small>
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="form3Example3cg">Phone Number</label>
                                    <input type="phone_number" id="form3Example3cg" class="form-control form-control-lg" />
                                    <small class="text-danger">INI UTK ERROR MSG</small>
                                </div>
                                <div class="mb-4 text-white">
                                    <label class="form-label" for="form3Example4cg">Pin</label>
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                                    <small class="text-danger">INI UTK ERROR MSG</small>
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="form3Example4cdg">Repeat your pin</label>
                                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                                    <small class="text-danger">INI UTK ERROR MSG</small>
                                </div>


                                <h4 class="text-white">Address :</h4>
                                <div class="mb-4 text-white">
                                    <label class="form-label" for="street">Street</label>
                                    <input type="text" id="street" class="form-control form-control-lg" />
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="city">City</label>
                                    <input type="text" id="city" class="form-control form-control-lg" />
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="province">Province</label>
                                    <select id="province" class="form-select form-select-lg text-black">
                                         <option selected>Default</option>
                                         <option value="Medan">Medan</option>
                                         <option value="Jakarta">Jakarta</option>
                                    </select>
                                </div>

                                <div class="mb-4 text-white">
                                    <label class="form-label" for="postal_code">Postal Code</label>
                                    <input type="text" id="postal_code" class="form-control form-control-lg" />
                                </div>

                                <!-- <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                    <label class="form-check-label text-white" for="form2Example3g">
                                        I agree all statements in <a href="#!" class=""><u>Terms of service</u></a>
                                    </label>
                                </div> -->

                                <div class="d-flex justify-content-center">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5">Register</button>
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
