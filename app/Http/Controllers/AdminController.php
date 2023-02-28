<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function page_index()
   {
       if (Auth::user()->is_admin == 1) {
           return (view('admin.index'));
       } else {
           return (view('home'));
       }

   }
}
