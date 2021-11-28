<?php

namespace App\Http\Requests\User;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="LoginRequest",
 *      description="Login Request",
 *      type="object",
 *      required={"email", "password", "device_name"},
 *      example={
 *           "email": "saber.tabataba@gmail.com",
 *           "password": "adminadmin",
 *           "device_name": "flutter"
 *      }
 * )
 */
class LoginRequest extends BasicRequest
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
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ];
    }
}
