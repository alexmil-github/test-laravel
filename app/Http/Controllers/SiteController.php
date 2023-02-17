<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        if(Auth::attempt($request->only(['email', 'password'])))
            return redirect('/home');

        return back()->withErrors([
           'email' => 'Email or password incorrect'
        ]);



    }
}
