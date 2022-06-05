<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Stevebauman\Location\Facades\Location; buat load package user location

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
        // dd(Location::get('118.99.76.133')); ip buat user's location
        $resto = DB::table('users')
            ->where('is_restoran', '=', '1')
            ->paginate();
        return view('home', ['resto' => $resto]);
    }

    public function detail($id)
    {
        $resto = DB::table('users')
        ->join('restoran', 'users.id', '=', 'restoran.user_id')->where('users.id', $id)->get();
        $menu = DB::table('menu')->join('restoran', 'restoran.id', '=', 'menu.restoran_id')->where('restoran.user_id', $id)->get();
        return view('restoran.detail', ['resto' => $resto, 'menu' => $menu]);
    }
}
