<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index($id)
    {
        $news =  DB::table('posts')->where('id',$id)->get();
        if($news->first()==null){
            abort(404);
        }
        $allinfo = DB::table('posts')->where('id', $id)->get();
        return view('post', compact('allinfo'));
    }
}
