<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Register
    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $r)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'pass' => 'required|min:6',
            'confirmPass' => 'required|same:pass'
        ];

        $validate = Validator::make($r->all(), $rules);

        if ($validate->fails()) {
            return back()->withErrors($validate);
        }

        $user = new User();
        $user->name = $r->name;
        $user->email = $r->email;
        $user->password = bcrypt($r->pass);
        $user->isAdmin = false;

        $user->updated_at = Carbon::now();
        $user->created_at = Carbon::now();

        $user->save();

        return back()->with("status", "Register User Successfully!");
    }

    //Login
    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $r)
    {
        $validate = [
            'email' => $r->email,
            'password' => $r->password
        ];

        if($r->remember) {
            Cookie::queue('email', $r->email);
            Cookie::queue('password', $r->password);
        }else{
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
        }

        if (Auth::attempt($validate)) {
            return view('home');
        }

        return back()->withErrors("Email or Password Doesn't Matched!");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    //Edit Profile
    public function editPage()
    {
        return view('editProfile');
    }

    public function editedProfile(Request $r)
    {
        $rules = [
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|email:rfc,dns|unique:users,email',
        ];

        $validate = Validator::make($r->all(), $rules);

        if ($validate->fails()) {
            return back()->withErrors($validate);
        }

        $user = User::find(Auth::user()->id);
        $user->name = $r->name;
        $user->email = $r->email;

        $user->updated_at = Carbon::now();

        $user->save();

        return back()->with("status", "Profile Changed Successfully!");
    }

    //Change Password
    public function changePassPage()
    {
        return view('changePassword');
    }

    public function updatePass(Request $r)
    {
        $rules = [
            'oldPass' => 'required|min:6',
            'newPass' => 'required|min:6',
            'confirmPass' => 'required|same:newPass'
        ];

        $validate = Validator::make($r->all(), $rules);

        if ($validate->fails()) {
            return back()->withErrors($validate);
        }

        $user = User::find(Auth::user()->id);

        $user->password = bcrypt($r->newPass);

        $user->updated_at = Carbon::now();

        $user->save();

        return back()->with("status", "Password Changed Successfully!");
    }
}