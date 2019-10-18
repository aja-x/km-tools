<?php

namespace App\Http\Controllers;

use App\Article;
use App\Services\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
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

    public function getAll()
    {
        $articles = Article::all();
        return Response::returnResponse('data', $articles, 200);
    }

    public function getDetails($id)
    {
        $article = Article::findOrFail($id);
        return Response::returnResponse('data', $article, 200);
    }

    public function getSpecific($id_interest_category)
    {
        $article = Article::where('id_interest_category', $id_interest_category)->get();
        return Response::returnResponse('data', $article, 200);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'content' => 'required|string',
//                'last_edited' => 'timestamp',
//                'published_date' => 'timestamp',
                'id_interest_category' => 'required|integer'
            ]);
        } catch (ValidationException $e) {
            return Response::returnResponse('error', $e, 400);
        }
        $article = Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'last_edited' => $request->input('last_edited'),
            'published_date' => $request->input('published_date'),
            'id_interest_category' => $request->input('id_interest_category'),
        ]);
        if (!$article)
            return Response::returnResponse('error', 'Store error', 400);
        else
            return Response::returnResponse('Object created', $article, 201);
    }
}
