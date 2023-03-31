<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $likes = auth()->user()->LikedPosts->count();
        $comments = auth()->user()->Comments->count();
        return view('personal.main.index', compact('likes', 'comments') );
    }
}
