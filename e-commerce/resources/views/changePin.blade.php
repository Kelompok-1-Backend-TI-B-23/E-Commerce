@extends('template')

@section('title')
    Change PIN
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4"><b>Change PIN</b></h4>

                    <!-- Display Success Message -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="pin-change-form">
                        <form action="/changePin" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="currentPin" class="form-label">Current PIN</label>
                                <input type="password" class="form-control" id="currentPin" name="pin" placeholder="Enter current PIN" required>
                            </div>
                            <div class="mb-3">
                                <label for="newPin" class="form-label">New PIN</label>
                                <input type="password" class="form-control" id="newPin" name="new_pin" placeholder="Enter new PIN" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPin" class="form-label">Confirm New PIN</label>
                                <input type="password" class="form-control" id="confirmNewPin" name="new_pin_confirmation" placeholder="Confirm new PIN" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark">Change PIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
