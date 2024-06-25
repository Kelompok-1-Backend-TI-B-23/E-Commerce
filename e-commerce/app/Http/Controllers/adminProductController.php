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

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('adminEditProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;

        $product->save();

        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Product deleted successfully');
    }
}
