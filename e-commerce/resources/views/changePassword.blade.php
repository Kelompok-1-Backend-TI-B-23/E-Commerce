@extends ('template')

@section('title')
    Change Password
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4"><b>Change Password</b></h4>
                    <div class="password-change-form">
                        <form>
                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmNewPassword" placeholder="Confirm new password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection