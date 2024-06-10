@extends ('template')

@section('title')
    Change PIN
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4"><b>Change PIN</b></h4>
                    <div class="pin-change-form">
                        <form>
                            <div class="mb-3">
                                <label for="currentPin" class="form-label">Current PIN</label>
                                <input type="password" class="form-control" id="currentPin" placeholder="Enter current PIN">
                            </div>
                            <div class="mb-3">
                                <label for="newPin" class="form-label">New PIN</label>
                                <input type="password" class="form-control" id="newPin" placeholder="Enter new PIN">
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPin" class="form-label">Confirm New PIN</label>
                                <input type="password" class="form-control" id="confirmNewPin" placeholder="Confirm new PIN">
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
