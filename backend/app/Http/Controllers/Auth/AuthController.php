<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Http\Response;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return Response::success($user, 201);
    }

    private function createPayload(User $user)
    {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60 // Expiration time
        ];

        return JWT::encode($payload, env('JWT_KEY'));
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if (!$user)
            return Response::returnResponse('error', 'Email or password is wrong.', 400);

        if (Hash::check($request->input('password'), $user->password))
            return Response::returnResponse('token', $this->createPayload($user), 200);

        return Response::returnResponse('error', 'Email or password is wrong.', 400);
    }

}
