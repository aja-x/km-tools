<?php

namespace App\Http\Controllers;

use App\Article;
use App\Services\Http\Response;
use App\User;
use App\UserKmAttribute;
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
        try
        {
            $this->validate($request, [
                'name' => 'required|string',
                'username' => 'required|string',
                'email' => 'required|email',
                'password' => 'required',
            ]);
        }
        catch (ValidationException $e)
        {
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

    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'name' => 'required|string',
                'username' => 'required|string',
                'email' => 'required|email',
                'password' => 'required',
                'id_interest_category' => 'required|number'
            ]);
        }
        catch (ValidationException $e)
        {
            return Response::returnResponse('error', $e, 400);
        }
        $user = User::findOrFail($id)->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $userKmAttibute = UserKmAttribute::findOrFail($id)->update([
            'id_interest_category' => $request->input('id_interest_category'),
        ]);
        if (!$user || !$userKmAttibute)
            return Response::returnResponse('error', 'Update error', 400);
        else
            return Response::returnResponse('Object updated', $article, 200);
    }

    public function destroy($id)
    {
        $user = User::destroy($id);
        $userKmAttribute = UserKmAttribute::where('id_interest_category', $id)->delete();
        if (!$user ||!$userKmAttribute)
            return Response::returnResponse('error', 'Destroy error', 400);
        else
            return Response::returnResponse('Object destroyed', '', 204);
    }
}
