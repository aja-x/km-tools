<?php

namespace App\Http\Controllers;

use App\Services\Http\Response;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string',
                'username' => 'required|string',
                'email' => 'required|email',
                'password' => 'required',
            ]);
        } catch (ValidationException $e) {
            return Response::returnResponse('error', $e, 400);
        }
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        if (!$user)
            return Response::returnResponse('error', 'Store error', 400);
        else
            return Response::returnResponse('Object created', $user, 201);
    }
}
