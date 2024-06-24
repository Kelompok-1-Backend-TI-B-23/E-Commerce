@extends('template')

@section('title')
    Admin Dashboard
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

<div class="container mt-4 mb-4">
    <h1>Admin Dashboard</h1>
    <div class="row mt-5">
        <div class="col-md-4 d-flex justify-content-center mb-4">
            <a href="{{ route('admin.products.create') }}" class="btn btn-dark btn-lg rounded-3" style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                Add Product
            </a>
        </div>
        <div class="col-md-4 d-flex justify-content-center mb-4">
            <a href="{{ route('admin.dashboard.product') }}" class="btn btn-dark btn-lg rounded-3" style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                Edit Product
            </a>
        </div>
        <div class="col-md-4 d-flex justify-content-center mb-4">
            <a href="#" class="btn btn-dark btn-lg rounded-3" style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                See Purchase
            </a>
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
