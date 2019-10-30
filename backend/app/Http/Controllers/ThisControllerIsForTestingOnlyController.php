<?php

namespace App\Http\Controllers;

use App\Services\Http\Response;
use App\Test;

class ThisControllerIsForTestingOnlyController extends Controller
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

    public function test($id)
    {
        $test = Test::select('tests.*', 'articles.title', 'test_categories.name', 'questions.id as id_question', 'questions.content as content_question')
            ->where('tests.id', $id)
            ->join('articles', 'tests.id_article', '=', 'articles.id')
            ->join('test_categories', 'tests.id_test_category', '=', 'test_categories.id')
            ->join('questions', 'tests.id', '=', 'questions.id_test')
            ->join('question_choices', 'questions.id', '=', 'question_choices.id_question')
            ->get();
        return Response::plain(['data' => $test], 200);
    }
}
