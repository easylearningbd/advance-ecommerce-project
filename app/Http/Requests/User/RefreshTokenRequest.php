<?php

namespace App\Http\Requests\User;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="RefreshTokenRequest",
 *      description="Refresh Token Request",
 *      type="object",
 *      required={"token_name"},
 *      example={
 *           "token_name": "web:read"
 *      }
 * )
 */

class RefreshTokenRequest extends BasicRequest
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
            'token_name' => 'required|string|max:255',
        ];
    }
}
