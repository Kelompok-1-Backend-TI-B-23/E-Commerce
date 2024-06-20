@extends('template')

@section('title')
Home Content
@endsection

@section('content')
<div class="">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center mb-4">Search and Filter Products</h2>
        <div class="input-group d-flex justify-content-center mb-4">
            <form action="{{ route('products.index') }}" method="GET" class="d-flex">
                <select name="category" class="custom-select mr-2">
                    <option value="">All Categories</option>
                    <option value="pants" {{ request()->input('category') == 'pants' ? 'selected' : '' }}>Pants</option>
                    <option value="shirt" {{ request()->input('category') == 'shirt' ? 'selected' : '' }}>Shirt</option>
                    <option value="shoes" {{ request()->input('category') == 'shoes' ? 'selected' : '' }}>Shoes</option>
                </select>
                <select name="sort_by" class="custom-select ml-2">
                    <option value="name" {{ request()->input('sort_by') == 'name' ? 'selected' : '' }}>Sort by Name</option>
                    <option value="rating" {{ request()->input('sort_by') == 'rating' ? 'selected' : '' }}>Sort by Rating</option>
                    <option value="popularity" {{ request()->input('sort_by') == 'popularity' ? 'selected' : '' }}>Sort by Popularity</option>
                    <option value="price" {{ request()->input('sort_by') == 'price' ? 'selected' : '' }}>Sort by Price</option>
                </select>
                @if (request()->input('sort_by') == 'name')
                    <select name="sort_direction" class="custom-select ml-2">
                        <option value="asc" {{ request()->input('sort_direction') == 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ request()->input('sort_direction') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                @endif
                <button class="btn btn-dark ml-2" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center mb-4">Products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="product card-img-top" src="{{ asset($product->image_url) }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <small>{{ $product->category }}</small>
                            <br>
                            <!-- Product price-->
                            <small>{{ $product->price }}</small>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add To Cart</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
