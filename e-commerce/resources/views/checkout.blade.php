@extends('template')

@section('title')
    Checkout
@endsection

@section('content')
<div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="mr-1">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Shopping Cart</b></h4></div>
                        <div class="col align-self-center text-right text-muted">3 items</div>
                    </div>
                </div>    
                 @foreach($cart->items as $item)
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="{{ $item->product->image_url }}" alt="{{ $item->product->product_name }}"></div>
                        <div class="col">
                            <div class="row text-muted">{{ $item->product->category ?? 'Product' }}</div>
                            <div class="row">{{ $item->product->product_name }}</div>
                            <div class="row">Quantity: {{ $item->quantity }}</div>
                        </div>
                        <div class="col">
                            &euro; {{ number_format($item->product->price * $item->quantity, 2) }}
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
                    <div class="col m-3" style="padding-left:0;">Total items: {{ $cart->items->count() }}</div>
                    <div class="col m-3 text-right">Rp. {{ number_format($cart->items->sum(function($item) {
                        return $item->quantity * $item->product->price;
                    }), 2) }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col m-3" style="padding-left:0;">Shipping</div>
                    <div class="col m-3 text-right">Rp. {{ number_format($shippingCost, 2) }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col m-3" style="padding-left:0;">Total Price</div>
                    <div class="col m-3 text-right">Rp. {{ number_format($cart->items->sum(function($item) {
                        return $item->quantity * $item->product->price;
                    }) + $shippingCost, 2) }}</div>
                </div>

                <div class="d-grid gap-2">
                    <a class="btn btn-dark mt-3" {{ route('user.checkout.process') }}">Pay</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
