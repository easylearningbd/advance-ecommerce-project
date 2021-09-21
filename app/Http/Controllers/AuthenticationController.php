<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

    //this method adds new users
    public function createAccount(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

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

    //use this method to signin users
    public function signIn(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }
        $user = $request->user();

        $tokenResult =  $user->createToken('Personal Access Token');
//        $token = $tokenResult->token;
//        if ($request->remember_me)
//            $token->expires_at = Carbon::now()->addWeeks(1);
//        $token->save();


        return response([
            'token' => $tokenResult->plainTextToken,
            'token_type' => 'Bearer',
//            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
    }

    // this method signs out users by removing tokens
    public function signout(): array
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked',
            'token_type' => 'Bearer',
        ];
    }
}
