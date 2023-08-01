<?php

namespace App\Models\Order;

use Jenssegers\Mongodb\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function save($order, $product): Model;
    public function setprice($order ,$product): Model;
    public function getOrder(): Model;
}
