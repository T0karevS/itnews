<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('user.'));
        }
        $validateFields = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);
        if (User::where('email', $validateFields['email'])->exists()){
            redirect(route('user.'))->withErrors([
                'formError'=>'Email уже используется'
            ]);
        }
        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect(route('user.'));
        }
            return redirect(route('user.login'))->withErrors([
                'formError' => 'произошла ошибка при сохранении пользователя'
            ]);        
    }
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image',
        ]);
  
        $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);
  
        Auth()->user()->update(['avatar'=>$avatarName]);
  
        return back()->with('success', 'Avatar updated successfully.');
    }
}

