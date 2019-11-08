<?php

namespace App\Http\Controllers;

use App\InterestCategory;
use App\Services\Http\Response;
use App\ErrorReport;
use App\User;
use Illuminate\Http\Request;

class ErrorReportController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->rules = [
            'title' => 'required|string',
            'content' => 'required|string',
            'id_user' => 'required|number',
            'id_interest_category' => 'required|number',
        ];
    }

    public function index()
    {
        return Response::view(ErrorReport::all());
    }

    public function view($id)
    {
        return Response::view(ErrorReport::findOrFail($id));
    }

    public function store(Request $request)
    {
        try
        {
            $this->validate($request, $this->rules);
            $user = User::findOrFail($request->input('id_user'));
            $interestCategory = InterestCategory::findOrFail($request->input('id_interest_category'));
        }
        catch (\Exception $exception)
        {
            return Response::plain(['message' => 'Error, bad request'], 400);
        }
        $errorReport = ErrorReport::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'id_user' => $request->input('id_user'),
            'id_interest_category' => $request->input('id_interest_category'),
        ]);
        return Response::success($errorReport, 201);
    }

    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, $this->rules);
            $user = User::findOrFail($request->input('id_user'));
            $interestCategory = InterestCategory::findOrFail($request->input('id_interest_category'));
        }
        catch (\Exception $exception)
        {
            return Response::plain(['message' => 'Error, bad request'], 400);
        }
        $errorReport = ErrorReport::findOrFail($id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'id_user' => $request->input('id_user'),
            'id_interest_category' => $request->input('id_interest_category'),
        ]);
        return Response::success($errorReport, 201);
    }

    public function destroy($id)
    {
        return Response::success(ErrorReport::destroy($id), 204);
    }
}
