@extends ('template')

@section('title')
    Product Detail
@endsection

@section('content')
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" />
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <div class="fs-5 mb-5">
                <h6>{{ $product->category}}</h3>
                <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                <div class="fs-5 mt-2">
                <h6>Stock : {{ $product->stock}}</h3>
                </div>
                <p class="lead">{{ $product->description }}</p>
                <!-- Product actions-->
                <div class="d-flex">
                    <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark flex-shrink-0">
                            <i class="bi-cart-fill me-1"></i>
                            Add To Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content">
            @foreach ($relatedProduct as $related)
            <!-- Foreach -->
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <a href="{{ route('user.indexProduct', ['id' => $related->id]) }}">
                        <img class="related card-img-top" src="{{ asset($related->image_url) }}" alt="..." />
                    </a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $related->name }}</h5>
                            <!-- Product Category-->
                            <h6>{{ $related->category}}</h3>
                            <!-- Product price-->
                            <span>Rp {{ number_format($related->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <form action="{{ route('user.cart.add', $related->id) }}" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-outline-dark mt-auto">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end foreach  -->
            @endforeach
        </div>
    </div>
</section>
@endsection