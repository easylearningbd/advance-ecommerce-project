<?php

namespace App\Http\Requests;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="OrderWithOrderItemRequest",
 *      description="Order With OrderItem Request",
 *      type="object",
 *      required={"email", "password"},
 *      example={
 *           "product_id": 5,
 *           "user_id": 5,
 *           "total_amount": 50000
 *      }
 * )
 */
class OrderWithOrderItemRequest extends BasicRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required',
            'user_id' => 'required',
            'total_amount' => 'required',
        ];
    }
}
