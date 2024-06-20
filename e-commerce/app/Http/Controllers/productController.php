<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $sortBy = $request->input('sort_by', 'rating'); // default : sort by rating
        $sortDirection = $request->input('sort_direction', 'asc'); // default : descending

        $products = Product::query();

        if ($query) {
            $products = $products->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('category', 'LIKE', "%{$query}%");
            });
        }

        if ($category) {
            $products = $products->where('category', $category);
        }

        switch ($sortBy) {
            case 'name':
                $products = $products->orderBy('name', $sortDirection);
                break;
            case 'rating':
                $products = $products->orderBy('rating');
                break;
            case 'popularity':
                $products = $products->orderBy('sold_count');
                break;
            case 'price':
                $products = $products->orderBy('price');
                break;
            default:
                $products = $products->orderBy('rating');
                break;
        }

        $products = $products->get();

        // Mengirimkan data produk ke view 'product'
        return view('product', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);

        $product = Product::create($request->all());
        return redirect()->route('profile');
    }
}
