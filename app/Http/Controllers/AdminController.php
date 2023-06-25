<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function getPost()
    {
        if(  Auth::id()==null|| Auth::user()->role==1){
            return redirect('/');
        }
        $allposts = DB::table('posts')->get();
        return view('/admin', compact('allposts'));
    }
    public function DeletePost($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect('/admin');
    }
}
