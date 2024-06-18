@extends ('template')

@section('title')
    Purchase History
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4"><b>Purchase History</b></h4>
                    <div class="purchase-item mb-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Transaction ID: #123456</h5>
                                <p class="card-text text-muted">Date: June 1, 2024</p>
                                <p class="card-text">Product: T-shirt</p>
                                <p class="card-text">Price: Rp. 150.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="purchase-item mb-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Transaction ID: #789012</h5>
                                <p class="card-text text-muted">Date: May 15, 2024</p>
                                <p class="card-text">Product: Shoes</p>
                                <p class="card-text">Price: Rp. 300.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="purchase-item mb-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Transaction ID: #345678</h5>
                                <p class="card-text text-muted">Date: April 30, 2024</p>
                                <p class="card-text">Product: Jacket</p>
                                <p class="card-text">Price: Rp. 500.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
