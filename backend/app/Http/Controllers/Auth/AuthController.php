<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Http\Response;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $request;
    /**
     * Create a new controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function createPayload(User $user)
    {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60 // Expiration time
        ];

        return JWT::encode($payload, env('JWT_KEY'));
    }

    public function authenticate(User $user)
    {
        $this->validate($this->request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $this->request->input('email'))->first();
        if (!$user)
            return Response::returnResponse('error', 'Email or password is wrong.', 400);

        if (Hash::check($this->request->input('password'), $user->password))
            return Response::returnResponse('token', $this->createPayload($user), 200);

        return Response::returnResponse('error', 'Email or password is wrong.', 400);
    }

}
