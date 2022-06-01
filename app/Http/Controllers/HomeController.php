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
    // galih unfinished
    public function cari(Request $request)
	{

		$cari = $request->cari;


		$users = DB::table('users')
		->where('name','like', "%" . $cari . "%")
		->paginate();


		return view('home',['users' => $users]);

	}

    //sementara aku taruh sini ya
    public function edit($id)
    {
        $resto = DB::table('restoran')->where('user_id', $id)->get();
        return view('restoran.editrestoran', ['resto' => $resto]);
    }

    public function update(Request $request)
    {
        DB::table('restoran')->where('user_id', $request->user_id)->update([
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kategori' => $request->kategori
        ]);
        return redirect('/');
    }

    // error handling

    // public function store()
    // {
    //     $resto = DB::table('check_in_out')
    //     ->insert([
    //         'check_in' => $request->checkin,
    //         'check_out' => $request->checkout,
    //     ]);
    //     return redirect('/checkinout');
    // }
    // public function checkinout($id)
    // {
    //     $users = DB::table('users')
    //     ->join('check_in_out', 'users.id', '=', 'check_in_out.user_id')->where('users.id', $id)->get();
    //     //$resto = DB::table('resto')
    //     //->join('check_in_out', 'check_in_out.id', '=', 'restoran.checkinout_id')->where('restoran.checkinout_id', $id)->get();
    //     return view('checkinout', ['users' => $users]);
    // }
}
