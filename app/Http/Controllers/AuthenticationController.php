<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterRequest;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

    /**
     * @OA\Get(path="/api/users/profile/me",
     *   tags={"User Management"},
     *   summary="Get profile infos",
     *   description="Get profile infos",
     *   operationId="getProfileInformations",
     *
     *   security={ {"bearer": {} }},
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
    public function myProfile(Request $request)
    {
        return auth()->user();
//        return $request->user();
    }


    /**
     * @OA\Post (
     *      path="/api/sample2",
     *      operationId="getSample",
     *      tags={"Sample"},
     *      summary="get sample",
     *      description="return sample",
     *
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *      ),
     *
     *     @OA\Parameter(
     *          name="department",
     *          required=true,
     *          in="header",
     *          example=1,
     *          ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *       ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function refreshToken(Request $request): array
    {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    }


    /**
     * @OA\Post (
     *      path="/api/login",
     *      operationId="login",
     *      tags={"User Management"},
     *      summary="login with email",
     *      description="login with email",
     *
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginEmail(LoginRequest $request)
    {
        $user = User::query()->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response([
            'token' => $user->createToken('tokens')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }

    //this method adds new users
    public function register(RegisterRequest $request)
    {
        $attr = $request->validated();

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return response([
            'token' => $user->createToken('tokens')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }

    //use this method to sign-in users
    public function login(LoginRequest $request)
    {
        $attr = $request->validated();

        if (!Auth::attempt(Arr::only($attr, ['email', 'password']))) {
            return $this->error('Credentials not match', 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        return response([
            'token' => $tokenResult->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }

    // this method signs out users by removing tokens
    public function logout(): array
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked',
            'token_type' => 'Bearer',
        ];
    }
}
