<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class adminProductController extends Controller
{
    public function create()
    {
        return view('adminCreateProduct');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Product::create([
            'image_url' => $imagePath,
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Product added successfully');
    }
}
