@extends('template')

@section('title')
    Create Purchase History
@endsection

@section('content')
    <h1 class="mb4">Create Purchase History</h1>
    <form action="/user/store" method="POST">
        @csrf
        <div class="mb3">
            <label for="ship_fee" class="db mb2">Shipping Fee</label>
            <input type="text" name="ship_fee" id="ship_fee" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
        </div>
        <div class="mb3">
            <label for="total_price" class="db mb2">Total Price</label>
            <input type="text" name="total_price" id="total_price" class="input-reset ba b--black-20 pa2 mb2 db w-100" required>
        </div>
        <div id="productInputs">
            <div class="product-input">
                <input type="text" name="products[0][product_id]" placeholder="Product ID" required>
                <input type="number" name="products[0][quantity]" placeholder="Quantity" required>
                <button type="button" class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6" onclick="removeProductInput(this)">Remove</button>
            </div>
        </div>
        <button type="button" class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6" onclick="addProductInput()">Add Another Product</button>
        <button type="submit" class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6">Submit</button>
    </form>

    <script>
        let productIndex = 1;

        function addProductInput() {
            const productInputs = document.getElementById('productInputs');
            const newProductInput = document.createElement('div');
            newProductInput.classList.add('product-input');
            newProductInput.innerHTML = `
                <input type="text" name="products[${productIndex}][product_id]" placeholder="Product ID" required>
                <input type="number" name="products[${productIndex}][quantity]" placeholder="Quantity" required>
                <button type="button" class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6" onclick="removeProductInput(this)">Remove</button>
            `;
            productInputs.appendChild(newProductInput);
            productIndex++;
        }

        function removeProductInput(button) {
            const productInput = button.parentElement;
            productInput.remove();
        }
    </script>
@endsection
