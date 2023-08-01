<?php

namespace App\Models\Order;

use App\Models\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Eloquent\Model;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Model
     */
    public function getOrder(): Model
    {
        $order = new Order(['user_id' => Auth::user()->id]);
        $order->save();

        return $order;
    }

    /**
     * @param $order
     * @param $product
     * @return Model
     */
    public function save($order, $product): Model
    {
       return $order->products()->save($product);
    }

    /**
     * @param $order
     * @param $product
     * @return Model
     */
    public function setprice($order ,$product): Model
    {
        $order->total_price += $product->price;
        $order->save();

        return $order;
    }
}
