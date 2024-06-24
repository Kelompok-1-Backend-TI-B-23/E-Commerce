@extends('template')

@section('title', 'Top-up Balance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4"><b>Top-up Balance</b></h4>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="border-top border-bottom mt-4">
                        <p class="text-muted text-center">Current Balance</p>
                        <p class="text-center">Rp. {{ number_format($user->balance, 2) }}</p>
                    </div>
                    <form action="{{ route('user.topup') }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <p class="text-muted text-center">Enter Amount to Top-up</p>
                            <div class="input-group mb-3 justify-content-center">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="amount" class="form-control" placeholder="0" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="d-grid gap-2">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#pinModal">Confirm</button>
                            </div>
                        </div>

                        <!-- Pin Modal -->
                        <div class="modal fade" id="pinModal" tabindex="-1" aria-labelledby="pinModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pinModalLabel">Enter Your PIN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="password" name="pin" class="form-control" placeholder="PIN" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
