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
                                    <p class="card-text text-muted">Date: {{ $purchase->created_at }}</p>
                                    @foreach ($purchase->transaction as $product)
                                    <div class="card mb-3 p-2 d-flex flex-row">
                                        <div class="col-md-2">
                                            <img class="card-img-top mb-5 mb-md-0" src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" />
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="card-title" style="font-size: 1.25rem;">{{ $product->name }}</h6>
                                                <div></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="card-text" style="font-size: 0.75rem;">{{ $product->category }}</p>
                                                <p class="card-text">x {{ $product->pivot->quantity }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div></div>
                                                <p class="card-text">Rp {{ number_format($product->price * $product->pivot->quantity, 2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                    <p class="card-text">Shipping fee: <small>Rp {{ number_format($purchase->ship_fee, 0, ',', '.') }}</small></p>
                                    <p class="card-text">Transaction Price: <small>Rp {{ number_format($purchase->total_price, 0, ',', '.') }}</small></p>
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