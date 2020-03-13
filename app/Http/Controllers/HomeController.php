<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challange;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $challanges = Challange::all();
        return view('home', compact('challanges'));
    }

    public function adminHome()
    {
        return view('adminHome');
    }
}
