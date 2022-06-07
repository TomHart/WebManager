<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        dump(Auth::user()->loginStatus);
        return view('welcome');
    }
}
