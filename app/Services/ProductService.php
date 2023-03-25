<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{

    public const CORE_DIRECTORY         = 'public';
    public const DEFAULT_FILE_PATH      = 'storage/upload';
    public const THUMBNAIL              = self::DEFAULT_FILE_PATH.'/thumbnail';
    public const PRODUCT_ORIGINAL_IMAGE = self::DEFAULT_FILE_PATH."/products";

    public function getAll()
    {

        return Product::query()->latest()->get();
    }

    public function findById($id)
    {

        return Product::query()->findOrFail($id);
    }

    public function storeProduct($payloads)
    {

        return Product::query()->create($payloads);
    }


    public function updateProduct($id,$payloads)
    {
        $product = $this->findById($id);
        $product->update($payloads);

        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->findById($id);

        $product->delete();
    }


}
