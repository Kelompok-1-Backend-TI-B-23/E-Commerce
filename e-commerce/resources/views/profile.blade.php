@extends('template')

@section('title')
    Profile
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
            <div class="card-body">
                <h4 class="card-title mb-4"><b>Hi, {{ Auth::user()->username }}</b></h4>

                <div class="mb-4">
                    <h5 class="form-label opacity-75"><strong>Username</strong></h5>
                    <p>{{ Auth::user()->username }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="form-label opacity-75"><strong>Email</strong></h5>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <div class="mb-4">
                    <h5 class="form-label opacity-75"><strong>Phone Number</strong></h5>
                    <p>{{ Auth::user()->phone_number }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="form-label opacity-75"><strong>Address:</strong></h5>
                    <label for="namaToko" class="form-label opacity-75 pb-0 mb-0"><strong>Province</strong></label>
                    <p>{{ Auth::user()->address_province }}</p>
                    <label for="namaToko" class="form-label opacity-75 pb-0 mb-0"><strong>City</strong></label>
                    <p>{{ Auth::user()->address_city }}</p>
                    <label for="namaToko" class="form-label opacity-75 pb-0 mb-0"><strong>Detail Street</strong></label>
                    <p>{{ Auth::user()->address_street }}</p>
                    <label for="namaToko" class="form-label opacity-75 pb-0 mb-0"><strong>Postal Code</strong></label>
                    <p>{{ Auth::user()->address_postal_code }}</p>
                </div>

                <div class="dark-mode float-end my-3">
                    <a href="{{route('user.updateProfile')}}" class="btn btn-dark">Update Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
