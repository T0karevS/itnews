<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getPost(Request $request)
    {
        $text = $request->search;
        $allposts = DB::table('posts')
               ->where('newsname', 'like', '%'.$text.'%')
               ->orWhere('content', 'like', '%'.$text.'%')
               ->orWhere('category', 'like', '%'.$text.'%')
               ->get();
        return view('/index', compact('allposts'));
    }
}
