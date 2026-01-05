@extends('layouts.app')

@section('title', 'Import Products')
@section('header-title', 'Import Products')

@section('content')

<div class="max-w-xl mx-auto bg-white shadow rounded p-6">
    <h2 class="text-lg font-semibold mb-4 text-gray-700">Import Products (CSV)</h2>

    <form action="{{ route('admin.products.import.post') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">CSV File</label>
            <input type="file" name="file" accept=".csv"
                   class="w-full border rounded p-2" required>
            <p class="text-xs text-gray-500 mt-1">
                Columns: name, description, price, stock, category
            </p>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 border rounded text-sm">Cancel</a>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded text-sm">
                Import
            </button>
        </div>
    </form>
</div>

@endsection
