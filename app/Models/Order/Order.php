<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    protected $collection = 'orders';
    protected $fillable = ['user_id', 'products', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
