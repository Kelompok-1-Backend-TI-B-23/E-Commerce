<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productdetailController extends Controller
{
    public function index($id)
    {
        // Mengambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Mengambil data produk untuk related product
        $relatedProduct = Product::where('category', $product->category)->where('id', '!=', $product->id)->get();

        // Mengarahkan ke view 'productdetail' dengan data produk
        return view('productdetail', compact('product', 'relatedProduct'));
    }
}