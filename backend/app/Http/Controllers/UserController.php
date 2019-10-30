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

    private $rules;

    public function __construct()
    {
        $this->rules = [
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'id_interest_category' => 'required|number'
        ];
    }

    public function view($id)
    {
        return Response::view(Article::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);
        $user = User::findOrFail($id)->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
        ]);
        $userKmAttibute = UserKmAttribute::findOrFail($id)->update([
            'id_interest_category' => $request->input('id_interest_category'),
        ]);
        return Response::success($user && $userKmAttibute);
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, ['password' => 'required']);

        $user = User::findOrFail($id);
        if (!(Hash::check($request->input('password'), $user->password)))
            Response::plain(['message' => 'Wrong password'], 400);

        $user->update([
            'password' => $request->input('password'),
        ]);
        return Response::success($user);
    }

    public function destroy($id)
    {
        return Response::success(User::destroy($id), 204);
    }
}
