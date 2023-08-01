<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\OrderSetRequest;
use App\Http\Resources\CustomApiResponse;
use App\Models\Product\Product;
use App\Traits\Order\InteractWithOrder;
use Illuminate\Validation\ValidationException;

class SetOrderAction
{
    use InteractWithOrder;

    /**
     * @param OrderSetRequest $request
     * @param Product $product
     * @return CustomApiResponse
     * @throws ValidationException
     */
    public function __invoke(OrderSetRequest $request, Product $product)
    {
        $requestedQuantity = $request->input('quantity');

        if (!$product->hasSufficientInventory($requestedQuantity)) {
            throw ValidationException::withMessages(['inventory' => 'Insufficient product inventory']);
        }

        $order = $this->OrderService()->getOrder();

        $order = $this->OrderService()->store($order ,$product);

        $order = $this->OrderService()->setprice($order ,$product);

        return new CustomApiResponse([
            'status' => '200',
            'message' => 'Order login successfully',
            'data' => ['order' => $order],
        ]);
    }
}
