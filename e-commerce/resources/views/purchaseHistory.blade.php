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
                    @if($user->history->isEmpty())
                        <h5 class="card-title text-center">You haven't make any purchase</h5>
                    @else
                        @foreach ($user->history as $purchase)
                        <div class="purchase-item mb-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Transaction ID: {{ $purchase->id }}</h5>
                                    <p class="card-text text-muted">Date: {{ $purchase->transaction_date }}</p>
                                    @foreach ($purchase->transaction as $product)
                                        <div class="card-body">
                                            <p class="card-text">Product: {{ $product->name }} </p> 
                                            <p class="card-text">Price: {{ $product->price }} </p>
                                            <p class="card-text">Qty: {{ $product->pivot->quantity }} </p>
                                        </div>
                                    @endforeach
                                    <p class="card-text">Shipping fee: {{ $purchase->ship_fee }}</p>
                                    <p class="card-text">Price: {{ $purchase->total_price }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
