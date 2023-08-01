<?php

namespace App\Models\Product;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $guarded = [];
    protected $fillable = ['name', 'price', 'inventory'];

    public function hasSufficientInventory($requestedQuantity)
    {
        return $this->inventory >= $requestedQuantity;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
