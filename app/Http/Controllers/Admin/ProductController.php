<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::latest()->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'nullable|string',
           'price' => 'required|numeric|min:0',
           'stock' => 'required|integer|min:0',
           'image' => 'nullable|image|max:2048',
           'category' => 'nullable|string|max:100',
       ]);
         // Logic to store the product
         $file = $request->file('image');
            if ($file) {
                $path = $file->store('products', 'public');
                $request->merge(['image' => $path]);
            }
         Product::create($request->all());

         return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    //    return view('admin.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
       return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'nullable|string',
           'price' => 'required|numeric|min:0',
           'stock' => 'required|integer|min:0',
           'image' => 'nullable|image|max:2048',
           'category' => 'nullable|string|max:100',
       ]);
         // Logic to update the product
         $file = $request->file('image');
            if ($file) {
                $path = $file->store('products', 'public');
                $request->merge(['image' => $path]);
            }
         $product = Product::findOrFail($id);
         $product->update($request->all());

         return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

   public function importform(){
    return view('admin.product.import');
   }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,excel,xls,xlsx',
        ]);

        Excel::queueImport(new ProductImport, $request->file('file'));
       

        return redirect()->route('admin.products.index')->with('success', 'Products imported successfully.');
    }
}
