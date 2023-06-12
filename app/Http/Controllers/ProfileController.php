<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index($id)
    {
        $user =  User::where('id',$id)->get();
        if($user->first()==null){
            abort(404);
        }
        $allposts = DB::table('posts')->where('user_id', $id)->get();
        return view('profile', compact('user'), compact('allposts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);
        Auth()->user()->update(['avatar'=>$avatarName]);  
        return back()->with('success', 'ваш профиль обновлен.');
    }
    public function UpdPost($id)
    {
        $newCon = $request->content;
        $userID = Auth::id();  
        $category = $request->category;
        $imgName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('posts'), $imgName);
        $allposts = DB::table('posts')->update(['img'=>$imgName, 'content'=>$newCon, 'user_id'=>$userID, 'category'=>$category]);
        return back()->with('success');
    }
    public function Error($id)
    {
        $user =  User::where('id',$id)->get();
        if($user->first()->avatar==null)
        {
            return view('/index');
        }
    }
}
