<?php

namespace Tests\Feature\Order;

use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testAddProductToOrder()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $token = auth()->tokenById($user->id);
        $product = Product::factory()->create(['inventory' => 10, 'price' => 10, 'name' => 'product1']);

        $requestedQuantity = 2;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('post',"/api/order/{$product->id}", [
            'quantity' => $requestedQuantity,
        ]);

        $response->assertStatus(200);

        $order = Order::where('user_id', $user->id)->first();
        $this->assertNotNull($order);
        $this->assertEquals($product->price * $requestedQuantity, $order->total_price);
    }
}
