<?php

namespace App\Imports;

use App\Enums\ProductSizeUnits;
use App\Enums\ProductWeightUnits;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToModel, WithHeadingRow, WithChunkReading
{
    protected $shop;

    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //
        Product::create([
            'shop_id' => $this->shop->id,
            'name' => $row['name'],
            'description' => $row['description'],
            'weight' => $row['weight'],
            'weigh_unit' => ProductWeightUnits::getValue($row['weigh_unit']),
            'length' => $row['length'],
            'width' => $row['width'],
            'height' => $row['height'],
            'size_unit' => ProductSizeUnits::getValue($row['size_unit']),
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ]);
    }
}
