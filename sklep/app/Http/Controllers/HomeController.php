<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()!=null && Auth::user()->hasRole('user'))
        {
            return view('home.home');
        }
        else if(Auth::user()!=null && Auth::user()->hasRole('prac'))
        {
            return view('home.homePrac');
        }
        else if(Auth::user()!=null && Auth::user()->hasRole('admin'))
        {
            return view('home.homeAdmin');
        }
        else return view('home');
    }
}
