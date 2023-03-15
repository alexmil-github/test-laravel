<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
        $posts = Post::where([
            'author_id' => Auth::user()->author->id,
        ])->get();

        return (view('home', ['posts' => $posts]));
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

        if (Auth::attempt($request->only(['email', 'password'])))
            return redirect('/home');

        return back()->withErrors([
            'error' => 'Email or password incorrect'
        ]);


    }

    public function register(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users|max:255',
//           'password' => 'required|min:6',
            'password' => ['required', 'confirmed',
                Password::min(6)
                    ->letters() // Требуется хотя бы одна буква ...
                    ->mixedCase() // Требуется хотя бы одна заглавная и одна строчная буква...
                    ->numbers() // Требуется хотя бы одна цифра...
                    ->symbols() // Требуется хотя бы один символ...
            ],
            'password_confirmation' => 'required',
            'name' => 'required|string',
        ]);


        User::create([
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
