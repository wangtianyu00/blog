<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    //
    public function index()
    {
        return view('article');
    }

    public function new()
    {
        return view('newarticle');
    }
}
