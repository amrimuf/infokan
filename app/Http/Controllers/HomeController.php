<?php

namespace App\Http\Controllers;

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
    public function cari(Request $request)
	{

		$cari = $request->cari;


		$users = DB::table('users')
		->where('name','like', "%" . $cari . "%")
		->paginate();


		return view('home',['users' => $users]);

	}
}
