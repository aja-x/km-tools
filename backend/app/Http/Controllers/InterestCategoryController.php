<?php

namespace App\Http\Controllers;

use App\InterestCategory;
use App\Services\Http\Response;

class InterestCategoryController extends Controller
{
    public function index()
    {
        return Response::view(InterestCategory::all());
    }
}
