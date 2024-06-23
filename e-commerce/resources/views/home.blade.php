@extends ('template')

@section('title')
Home Content
@endsection

@section('content')
<div class="">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center mb-4">Filter by Category</h2>
        <div class="input-group d-flex justify-content-center">
            <select class="custom-select" id="inputGroupSelect04">
                <option selected>Choose filter</option>
                <!-- FOREACH -->
                <option value="MASUKIN ID VALUE">One</option>
                <!-- END FORACH -->
            </select>
            <div class="input-group-append">
                <button class="btn btn-dark" type="button">Button</button>
            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center mb-4">Products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
            <!-- Foreach -->
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <a href="{{ route('user.indexProduct', ['id' => $product->id]) }}">
                        <img class="product card-img-top" src="{{ asset($product->image_url) }}" alt="..." />
                    </a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <!-- Product Category-->
                            <h6>{{ $product->category}}</h3>
                            <!-- Product price-->
                            <span>Rp {{ $product->price }}</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add To Cart</a></div>
                    </div>
                </div>
            </div>
            <!-- end foreach  -->
            @endforeach

        </div>
    </div>
</div>
@endsection