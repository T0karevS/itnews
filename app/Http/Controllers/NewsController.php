<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index($id)
    {
        $news =  DB::table('posts')->where('id',$id)->get();
        if($news->first()==null){
            abort(404);
        }
        $allinfo = DB::table('posts')->where('id', $id)->get();
        $allcomms = DB::table('comments')->where('post_id', $id)->get();
        
        return view('post', compact('allinfo', 'allcomms'));
    }   
    public function newComment(Request $request)
    {
        if(Auth::id()==null){
            return view('/login');
        }
        $text = $request->text;
        $userID = Auth::id();  
        $post_id = $request->post_id;
        DB::table('comments')->insert(['text'=>$text, 'user_id'=>$userID, 'post_id'=>$post_id]);
        return redirect()->route('user.news.post', ['id' => $post_id]);
    }
}
