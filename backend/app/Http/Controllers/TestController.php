<?php

namespace App\Http\Controllers;

use App\Test;
use App\Services\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TestController extends Controller
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

    public function index($id)
    {
        $test = Test::select('tests.*', 'questions.content as content_question', 'questions.id as id_question',
            'question_choices.id as id_question_choice', 'question_choices.is_correct',
            'question_choices.content as content_question_choice')
            ->join('articles', 'tests.id_article', '=', 'articles.id')
            ->join('test_categories', 'tests.id_test_category', '=', 'test_categories.id')
            ->join('questions', 'tests.id', '=', 'questions.id_test')
            ->join('question_choices', 'questions.id', '=', 'question_choices.id_question')
            ->where('tests.id', $id)
            ->get();
        return Response::returnResponse('data', $test, 200);
    }

    public function view($id)
    {
        $test = Test::findOrFail($id);
        return Response::returnResponse('data', $test, 200);
    }

    public function filterCategory($id_test_category)
    {
        $test = Test::where('id_test_category', $id_test_category)->get();
        return Response::returnResponse('data', $test, 200);
    }

    public function store(Request $request)
    {
        try
        {
            $this->validate($request, [
                'duration' => 'required|date_format:H:i:s',
                'id_article' => 'required|integer',
                'id_test_category' => 'required|integer',
            ]);
        }
        catch (ValidationException $e)
        {
            return Response::returnResponse('error', $e, 400);
        }
        $test = Test::create([
            'duration' => $request->input('duration'),
            'id_article' => $request->input('id_article'),
            'id_test_category' => $request->input('id_test_category'),
        ]);
        if (!$test)
            return Response::returnResponse('error', 'Store error', 400);
        else
            return Response::returnResponse('Object created', $test, 201);
    }

    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'duration' => 'required|date_format:H:i:s',
                'id_article' => 'required|integer',
                'id_test_category' => 'required|integer',
            ]);
        }
        catch (ValidationException $e)
        {
            return Response::returnResponse('error', $e, 400);
        }
        $test = Test::findOrFail($id)->update([
            'duration' => $request->input('duration'),
            'id_article' => $request->input('id_article'),
            'id_test_category' => $request->input('id_test_category'),
        ]);
        if (!$test)
            return Response::returnResponse('error', 'Update error', 400);
        else
            return Response::returnResponse('Object updated', $test, 200);
    }

    public function destroy($id)
    {
        if (!Test::destroy($id))
            return Response::returnResponse('error', 'Destroy error', 400);
        else
            return Response::returnResponse('Object destroyed', '', 204);
    }
}
