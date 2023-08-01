<?php

namespace App\Services\Order;

use Jenssegers\Mongodb\Eloquent\Model;

interface OrderServiceInterface
{
    public function getOrder(): Model;
    public function store($order ,$product): Model;
    public function setprice($order ,$product): Model;
}
