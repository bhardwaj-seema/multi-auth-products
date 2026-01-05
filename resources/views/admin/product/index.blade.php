@extends('layouts.app')

@section('title', 'Products')
@section('header-title', 'Products')

@section('content')

<!-- Header actions -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold text-gray-700">
        Product List
    </h2>

    <a href="{{ route('admin.products.create') }}"
       class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded text-sm">
        + Add Product
    </a>
     <a class="underline-none" href="{{ route('admin.products.import') }}"
       class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 mx-3 rounded text-sm">
         Import Products
    </a>
</div>

<!-- Table -->
<div class="bg-white rounded shadow overflow-hidden">

    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Name</th>
                <th class="text-left px-4 py-3">Price</th>
            <th class="text-left px-4 py-3">Image
</th>
                <th class="text-right px-4 py-3">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @forelse ($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $product->name }}
                    </td>

                    <td class="px-4 py-3">
                        ₹{{ number_format($product->price, 2) }}
                    </td>

                   <td class="px-4 py-3">

                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-12 w-12 object-cover rounded">
                   </td>

                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="text-indigo-600 hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Are you sure?')"
                                class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                        No products found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if(method_exists($products, 'links'))
    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endif

@endsection
