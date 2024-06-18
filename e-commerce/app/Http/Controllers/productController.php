<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $sortBy = $request->input('sort_by', 'rating'); //default : sort by rating

        $products = Product::query();

        if ($query) {
            $products = $products->where('name', 'LIKE', "%{$query}%");
        }

        switch ($sortBy) {
            case 'category' :
                $products = $products->orderBy('category');
                break;
            case 'name' :
                $products = $products->orderBy('name');
                break;
            case 'price' :
                $products = $products->orderBy('price');
                break;
            case 'popularity' :
                $products = $products->orderBy('sold_count', 'desc');
                break;
            case 'rating' :
            default: 
                $products = $products->orderBy('rating', 'desc');
                break;
        }

        $products = $products->get();

        // Mengirimkan data produk ke view 'home'
        return view('product', ['products'=>$products]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'category'=>'required',
            'price' => 'required',
            'stock'=>'required',
            'description' => 'required',
            'image_url'=>'required',
        ]);
        
        $product = Product::create($request->all());
        return redirect()->route('profile');
    }

}
