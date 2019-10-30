<?php

namespace App\Http\Controllers;

use App\Article;
use App\Services\Http\Response;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $rules;

    public function __construct()
    {
        $this->rules = [
            'title' => 'required|string',
            'content' => 'required|string',
            'id_interest_category' => 'required|integer'
        ];
    }

    public function index()
    {
        return Response::view(Article::all());
    }

    public function view($id)
    {
        return Response::view(Article::findOrFail($id));
    }

    public function filterCategory($idInterestCategory)
    {
        return Response::view(Article::where('id_interest_category', $idInterestCategory)->get());
    }

    public function save(Request $request, $id = null)
    {
        $this->validate($request, $this->rules);
        if ($id === null)
            $article = Article::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'last_edited' => date("Y-m-d H:i:s"),
                'id_interest_category' => $request->input('id_interest_category'),
            ]);
        else
            $article = Article::findOrFail($id)->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'last_edited' => date("Y-m-d H:i:s"),
                'id_interest_category' => $request->input('id_interest_category'),
            ]);
        return Response::success($article, 201);
    }

    public function publish(Request $request, $id = null)
    {
        $this->validate($request, $this->rules);
        if ($id === null)
            $article = Article::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'last_edited' => date("Y-m-d H:i:s"),
                'published_date' => date("Y-m-d H:i:s"),
                'id_interest_category' => $request->input('id_interest_category'),
            ]);
        else
            $article = Article::findOrFail($id)->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'last_edited' => date("Y-m-d H:i:s"),
                'published_date' => date("Y-m-d H:i:s"),
                'id_interest_category' => $request->input('id_interest_category'),
            ]);
        return Response::success($article);
    }

    public function destroy($id)
    {
        return Response::success(Article::destroy($id), 204);
    }

}
