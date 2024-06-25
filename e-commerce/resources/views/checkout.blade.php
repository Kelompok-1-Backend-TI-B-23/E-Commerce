@extends('template')

@section('title')
    Checkout
@endsection

@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
<div class="modal fade" id="productAddedModal" tabindex="-1" aria-labelledby="productAddedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productAddedModalLabel">Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endif

<div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="mr-1">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Checkout</b></h4></div>
                        <div class="col align-self-center text-right text-muted">3 items</div>
                    </div>
                </div>    
                 @foreach($cart->items as $item)
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="{{ asset('storage/' . $item->product->image_url) }}" alt="{{ $item->product->product_name }}"></div>
                        <div class="col">
                            <div class="row text-muted">{{ $item->product->category ?? 'Product' }}</div>
                            <div class="row">{{ $item->product->name }}</div>
                            <div class="row">Quantity: {{ $item->quantity }}</div>
                        </div>
                        <div class="col">
                            Rp {{ number_format($item->product->price * $item->quantity, 2) }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="ms-1">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Summary</b></h4></div>
                    </div>
                </div>    
                <div class="row border-top">
                    <div class="col m-3" style="padding-left:0;">Total Items: {{ $cart->items->count() }}</div>
                    <div class="col m-3 text-right">Rp {{ number_format($cart->items->sum(function($item) {
                        return $item->quantity * $item->product->price;
                    }), 2) }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col m-3" style="padding-left:0;">Shipping</div>
                    <div class="col m-3 text-right">Rp {{ number_format($shippingCost, 2) }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col m-3" style="padding-left:0;">Total Price</div>
                    <div class="col m-3 text-right">Rp {{ number_format($cart->items->sum(function($item) {
                        return $item->quantity * $item->product->price;
                    }) + $shippingCost, 2) }}</div>
                </div>

                <div class="d-grid gap-2">
                    <form action="{{ route('user.checkout.process') }}" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="pin">PIN</label>
                            <input type="password" name="pin" class="form-control" id="pin" required>
                        </div>
                        <button type="submit" class="btn btn-dark mt-3">Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('productAddedModal'));
        myModal.show();
    });
</script>
@endif
@endsection
