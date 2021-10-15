<?php

namespace App\Http\Requests\User;

use Behamin\BResources\Requests\BasicRequest;

/**
 * @OA\Schema(
 *      title="RegisterRequest",
 *      description="Register Request",
 *      type="object",
 *      required={"name", "email", "password", "password_confirmation", "device_name"},
 *      example={
 *           "name": "saber.tabataba@gmail.com",
 *           "email": "saber.tabataba@gmail.com",
 *           "password": "adminadmin",
 *           "password_confirmation": "adminadmin",
 *           "device_name": "flutter"
 *      }
 * )
 */

class RegisterRequest extends BasicRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'device_name' => 'required'
        ];
    }
}
