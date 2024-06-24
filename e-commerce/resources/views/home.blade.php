@extends('template')

@section('title')
Home Content
@endsection

@section('content')
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

<div class="">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center mb-4">Search and Filter Products</h2>
        <div class="input-group d-flex justify-content-center mb-4">
            <form action="{{ route('products.index') }}" method="GET" class="d-flex">
                <select name="category" class="custom-select mx-2">
                    <option value="">All Categories</option>
                    <option value="Pants" {{ request()->input('category') == 'Pants' ? 'selected' : '' }}>Pants</option>
                    <option value="Shirts" {{ request()->input('category') == 'Shirts' ? 'selected' : '' }}>Shirts</option>
                    <option value="Shoes" {{ request()->input('category') == 'Shoes' ? 'selected' : '' }}>Shoes</option>
                </select>
                <select name="sort_by" class="custom-select mr-2">
                    <option value="name" {{ request()->input('sort_by') == 'name' ? 'selected' : '' }}>Sort by Name</option>
                    <option value="price" {{ request()->input('sort_by') == 'price' ? 'selected' : '' }}>Sort by Price</option>
                </select>
                @if (in_array(request()->input('sort_by'), ['name', 'price']))
                @php
                $sortDirection = request()->input('sort_direction', 'asc');
                $ascSelected = $sortDirection == 'asc' ? 'selected' : '';
                $descSelected = $sortDirection == 'desc' ? 'selected' : '';
                @endphp
                <select name="sort_direction" class="custom-select mx-2">
                    @if (request()->input('sort_by') == 'name')
                    <option value="asc" {{ $ascSelected }}>A-Z</option>
                    <option value="desc" {{ $descSelected }}>Z-A</option>
                    @elseif (in_array(request()->input('sort_by'), ['price']))
                    <option value="asc" {{ $ascSelected }}>Low to High</option>
                    <option value="desc" {{ $descSelected }}>High to Low</option>
                    @endif
                </select>
                @endif
                <button class="btn btn-dark mx-2" type="submit">Search</button>
            </form>
        </div>

    </div>
</div>

<div class="">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center mb-4">Products</h2>
        @if($products->isEmpty())
        <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-light">
                <div class="card-body text-center">
                    <h5 class="card-title">No Product Found</h5>
                    <p class="card-text">Sorry, there are no products available in this category.</p>
                </div>
            </div>
        </div>
    </div>
        @else
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <a href="{{ route('user.indexProduct', ['id' => $product->id]) }}">
                        <img class="product card-img-top" src="{{ asset('storage/' . $product->image_url) }}" alt="..." />
                    </a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <small>{{ $product->category }}</small>
                            <br>
                            <!-- Product price-->
                            <small>Rp {{ number_format($product->price, 0, ',', '.') }}</small>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
                                @csrf
                                
                                <button type="submit" class="btn btn-outline-dark mt-auto">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
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
