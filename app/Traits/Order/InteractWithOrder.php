<?php

namespace App\Traits\Order;

use App\Models\Order\OrderRepositoryInterface;
use App\Services\Order\OrderServiceInterface;

trait InteractWithOrder
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function OrderService()
    {
        try {
            return app()->make(OrderServiceInterface::class);
        }catch (\Exception $e) {
            throw new \Exception('Error');
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function OrderRepository()
    {
        try {
            return app()->make(OrderRepositoryInterface::class);
        }catch (\Exception $e) {
            throw new \Exception('Error');
        }
    }
}
