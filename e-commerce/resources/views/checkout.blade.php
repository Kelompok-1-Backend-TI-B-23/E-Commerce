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
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                        <div class="col">
                            <div class="row text-muted">Shirt</div>
                            <div class="row">Cotton T-shirt</div>
                            <div class="row">Quantity: 1</div>
                        </div>
                        <div class="col">
                            &euro; 44.00
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div>
                        <div class="col">
                            <div class="row text-muted">Shirt</div>
                            <div class="row">Cotton T-shirt</div>
                            <div class="row">Quantity: 1</div>
                        </div>
                        <div class="col">
                            &euro; 44.00
                        </div>
                    </div>
                </div>
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
                        <div class="col">
                            <div class="row text-muted">Shirt</div>
                            <div class="row">Cotton T-shirt</div>
                            <div class="row">Quantity: 1</div>
                        </div>
                        <div class="col">
                            &euro; 44.00
                        </div>
                    </div>
                </div>
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
                    <div class="col m-3" style="padding-left:0;">ITEMS 3</div>
                    <div class="col m-3 text-right">Rp. 132.00</div>
                </div>
                <div class="row mt-2">
                    <div class="col m-3" style="padding-left:0;">Shipping</div>
                    <div class="col m-3 text-right">Rp. 20.00</div>
                </div>
                <div class="row mt-2">
                    <div class="col m-3" style="padding-left:0;">Total Price</div>
                    <div class="col m-3 text-right">Rp. 152.00</div>
                </div>

                <div class="d-grid gap-2">
                    <a class="btn btn-dark mt-3" href="/checkout">Pay</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
