<?php

namespace App\Services\Order;

use App\Traits\Order\InteractWithOrder;
use Jenssegers\Mongodb\Eloquent\Model;

class OrderService implements OrderServiceInterface
{
    use InteractWithOrder;

    /**
     * @return Model
     * @throws \Exception
     */
    public function getOrder(): Model
    {
        return $this->OrderRepository()->getOrder();
    }

    /**
     * @param $order
     * @param $product
     * @return Model
     * @throws \Exception
     */
    public function store($order ,$product): Model
    {
        return $this->OrderRepository()->save($order ,$product);
    }

    /**
     * @param $order
     * @param $product
     * @return Model
     * @throws \Exception
     */
    public function setprice($order ,$product): Model
    {
        return $this->OrderRepository()->setprice($order ,$product);
    }
}
