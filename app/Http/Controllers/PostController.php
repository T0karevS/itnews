<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function newPost(Request $request)
    {
        
        $newCon = $request->content;
        $userID = Auth::id();  
        $category = $request->category;
        $imgName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('posts'), $imgName);
    
        DB::table('posts')->insert(['img'=>$imgName, 'content'=>$newCon, 'user_id'=>$userID, 'category'=>$category]);
    
        return back()->with('success');
    }
   public function getPost()
   {
    $allposts = DB::table('posts')->get();
    return view('/index', compact('allposts'));
   }
   public function getPostbyCat($category)
   {
    $allposts = DB::table('posts')->where('category', $category)->get();
    return view('/index', compact('allposts'));
   }
}
