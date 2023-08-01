<?php

namespace App\Traits\Product;

use App\Models\Product\ProductRepositoryInterface;
use App\Services\Product\ProductServiceInterface;

trait InteractWithProduct
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function ProductService()
    {
        try {
            return app()->make(ProductServiceInterface::class);
        }catch (\Exception $e) {
            throw new \Exception('Error');
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function ProductRepository()
    {
        try {
            return app()->make(ProductRepositoryInterface::class);
        }catch (\Exception $e) {
            throw new \Exception('Error');
        }
    }
}
