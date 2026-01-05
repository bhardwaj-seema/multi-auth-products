@extends('layouts.app')

@section('title', 'Edit Product')
@section('header-title', 'Edit Product')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow rounded p-6">
    <h2 class="text-lg font-semibold mb-6 text-gray-700">Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label class="block text-sm font-medium mb-1">Product Name</label>
            <input type="text" name="name"
                   value="{{ old('name', $product->name) }}"
                   class="w-full border-gray-300 rounded" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" rows="3"
                      class="w-full border-gray-300 rounded">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Price & Stock -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Price</label>
                <input type="number" step="0.01" name="price"
                       value="{{ old('price', $product->price) }}"
                       class="w-full border-gray-300 rounded" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Stock</label>
                <input type="number" name="stock"
                       value="{{ old('stock', $product->stock) }}"
                       class="w-full border-gray-300 rounded">
            </div>
        </div>

        <!-- Category -->
        <div>
            <label class="block text-sm font-medium mb-1">Category</label>
            <input type="text" name="category"
                   value="{{ old('category', $product->category) }}"
                   class="w-full border-gray-300 rounded">
        </div>

        <!-- Image -->
        <div>
            <label class="block text-sm font-medium mb-1">Product Image</label>
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}"
                     class="h-20 mb-2 rounded">
            @endif
            <input type="file" name="image" class="w-full text-sm">
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 border rounded text-sm">Cancel</a>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded text-sm">
                Update Product
            </button>
        </div>
    </form>
</div>

@endsection
