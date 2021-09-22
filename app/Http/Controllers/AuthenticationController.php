<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function myProfile(Request $request)
    {
        return auth()->user();
//        return $request->user();
    }

    /**
     * array
     */
    public function tokensCreate(Request $request): array
    {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    }

    /**
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
    public function createAccount(RegisterRequest $request)
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
    public function signIn(LoginRequest $request)
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
    public function signOut(): array
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked',
            'token_type' => 'Bearer',
        ];
    }
}
