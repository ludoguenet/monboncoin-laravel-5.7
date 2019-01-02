<?php

namespace Monboncoin\Http\Controllers;

use Illuminate\Http\Request;
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
        $messages = DB::table('messages')->where('seller_id', '=', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('home', compact('messages'));
    }
}
