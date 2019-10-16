<?php


namespace App\Services;


use App\Services\Http\Response;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected function createPayload(User $user)
    {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60 // Expiration time
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }

    public function checkPassword(User $user, $inputPassword)
    {
        if (Hash::check($inputPassword, $user->password)) {
            return Response::returnResponse('token', $this->createPayload($user), '200');
        }
    }


}
