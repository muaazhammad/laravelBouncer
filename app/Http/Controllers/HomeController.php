<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Bouncer;
use Illuminate\Support\Facades\DB;

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

        $admin= User::find(2);
        $writer= User::find(3);
        $editor= User::find(4);
        Bouncer::assign('admin')->to($admin);
        Bouncer::assign('writer')->to($writer);
        Bouncer::assign('editor')->to($editor);

        return view('home');
    }
}
