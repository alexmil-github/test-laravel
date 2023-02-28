<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function page_index()
    {
        $posts = Post::all();
        return (view('index', ['posts' => $posts]));
    }

    public function page_about()
    {
        return (view('about'));
    }


    public function page_home()
    {
        return (view('home'));
    }

    public function loginForm()
    {
        return view('login');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        if(Auth::attempt($request->only(['email', 'password'])))
            return redirect('/home');

        return back()->withErrors([
           'error' => 'Email or password incorrect'
        ]);



    }
    public function register(Request $request)
    {
        $request->validate([
           'email' => 'required|email|max:255',
           'password' => 'required|min:6',
           'name' => 'required|string',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

         return redirect('/login');




    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
