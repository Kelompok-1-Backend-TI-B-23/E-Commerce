@extends ('template')

@section('title')
Cart
@endsection

@section('content')
<div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="mr-1">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">{{ $cart->items->count() }} items</div>
                    </div>
                </div>
                @foreach($cart->items as $item)
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"></div>
                        <div class="col">
                            <div class="row text-muted">{{ $item->product->category ?? 'Product' }}</div>
                            <div class="row">{{ $item->product->product_name }}</div>
                        </div>
                        <div class="col">
                            <form action="{{ route('user.cart.update', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="0" style="width: 50px;">
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                            </form>
                        </div>
                        <div class="col">&euro; {{ number_format($item->product->price * $item->quantity, 2) }}
                            <form action="{{ route('user.cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="close">&#10005;</button>
                            </form>
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
                        <div class="col">
                            <h4><b>Summary</b></h4>
                        </div>
                    </div>
                </div>
                <div class="row border-top">
                    <div class="col m-3" style="padding-left:0;">ITEMS {{ $cart->items->count() }}</div>
                    <div class="col m-3 text-right">{{ number_format($cart->items->sum(function($item) {
                        return $item->quantity * $item->product->price;
                    }), 2) }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col m-3" style="padding-left:0;">Total Price</div>
                    <div class="col m-3 text-right">&euro; {{ number_format($cart->items->sum(function($item) {
                        return $item->quantity * $item->product->price;
                    }), 2) }}</div>
                </div>
                <div class="d-grid gap-2">
                    <a class="btn btn-dark mt-3" href="{{ route('user.checkout') }}">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
