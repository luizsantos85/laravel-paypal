<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserPassUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;



class UserController extends Controller
{
    public function profile()
    {
        return view('shop.profile.index');
    }

    public function updateName(UserUpdateRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->save();

        return redirect()->route('profile')->with('success', 'Dados atualizados com sucesso.');
    }

    public function userPass()
    {
        return view('shop.profile.password');
    }

    public function updatePass(UserPassUpdateRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('profile.userPass')->with('success', 'Dados atualizados com sucesso.');
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
