<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements 
ToModel, WithHeadingRow,WithBatchInserts,WithChunkReading,WithValidation,ShouldQueue
{
    

    public function model(array $row)
    {
       $imageName = trim($row['image'] ?? '');

$image = file_exists(
    public_path('storage/products/' . $imageName)
) ? $imageName : null;

        return new Product([
            'name'        => $row['name'],
            'description' => $row['description'] ?? null,
            'price'       => $row['price'],
            'stock'       => $row['stock'],
            'category'    => $row['category'],
            'image'       => $image ?? 'default.png',
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name' => 'required|string|max:255', 
            '*.description' => 'nullable|string',      
            '*.price' => 'required|numeric|min:0', 
            '*.stock' => 'required|integer|min:0',  
            '*.category' => 'nullable|string|max:100', 
            '*.image' => 'nullable|string|max:255',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
      }

    public function batchSize(): int
    {
        return 1000;
    }
}
