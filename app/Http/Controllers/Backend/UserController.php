<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResourceCollection;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Image;

class UserController extends Controller
{

    /**
     * @OA\Get(path="/api/users/{userId}/products/payed",
     *   tags={"Users"},
     *   summary="Returns payed products",
     *   description="Returns payed products",
     *   operationId="getPayedProducts",
     *
     *   parameters={},
     *
     *  @OA\Parameter(
     *       description="userId",
     *       name="userId",
     *       required=true,
     *       in="path",
     *       example="1",
     *       @OA\Schema(
     *           type="integer",
     *           format="int64"
     *       )
     *   ),
     *
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(
     *       additionalProperties={
     *         "type":"integer",
     *         "format":"int32"
     *       }
     *     )
     *   )
     * )
     */

    public function payedProducts($userId)
    {
        $orders = Order::query()->where('user_id', $userId)->get();
        $orderIds = $orders->pluck('id');

        $orderItems = OrderItem::query()->whereIn('order_id', $orderIds)->orderBy('id', 'desc')->get();
        $payedProductsIds = $orderItems->pluck('product_id')->unique();

        $entries = Product::query()
            ->whereIn('id', $payedProductsIds)
            ->get();
        return response(new ProductResourceCollection(['data' => $entries], true));

    }

}
