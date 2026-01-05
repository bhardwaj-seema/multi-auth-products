@extends('layouts.app')

@section('title', 'Create Product')
@section('header-title', 'Create Product')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow rounded p-6">

    <h2 class="text-lg font-semibold mb-6 text-gray-700">
        Add New Product
    </h2>

    <form action="{{ route('admin.products.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Product Name
            </label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="w-full border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500"
                   required>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Description
            </label>
            <textarea name="description"
                      rows="3"
                      class="w-full border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price & Stock -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Price
                </label>
                <input type="number"
                       step="0.01"
                       name="price"
                       value="{{ old('price') }}"
                       class="w-full border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500"
                       required>
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Stock
                </label>
                <input type="number"
                       name="stock"
                       value="{{ old('stock', 0) }}"
                       class="w-full border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">
                @error('stock')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Category -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Category
            </label>
            <input type="text"
                   name="category"
                   value="{{ old('category') }}"
                   class="w-full border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500">
            @error('category')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Product Image
            </label>
            <input type="file"
                   name="image"
                   class="w-full text-sm text-gray-700">
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 border rounded text-sm text-gray-600 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500 text-sm">
                Save Product
            </button>
        </div>

    </form>
</div>

@endsection
