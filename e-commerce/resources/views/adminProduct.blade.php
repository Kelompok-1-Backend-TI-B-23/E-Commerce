@extends ('template')

@section('title')
    Products
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4"><b>Products</b></h4>
                    @foreach($products as $product)
                        <div class="purchase-item mb-4">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text text-muted">Category: {{ $product->category }}</p>
                                            <p class="card-text">Description: {{ $product->description }}</p>
                                            <p class="card-text">Price: Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                            <p class="card-text">Stock: {{ $product->stock }}</p>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $product->image_url) }}" class="img-fluid rounded-end" alt="{{ $product->name }}" style="max-width: 150px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
