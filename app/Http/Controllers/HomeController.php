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
        $ip = request()->ip() || '114.125.79.173'; //Dynamic IP address get
        $data = \Location::get($ip);
        $resto = DB::table('restoran')->get();
        $user = DB::table('users')
            ->where('is_restoran', '=', '1')
            ->paginate();
        return view('home', compact('data', 'resto', 'user'));
    }

    public function detail($id)
    {
        $user = DB::table('users')->get();
        $resto = DB::table('restoran')->get();
        $menu = DB::table('menu')->get();
        return view('restoran.detail',  compact('menu', 'resto', 'user', 'id'));
    }
    // galih
    public function cari(Request $request)
	{

		$cari = $request->cari;


		$user = DB::table('users')
		->where('name','like',"%".$cari."%")
		->paginate();


        $ip = request()->ip() || '114.125.79.173'; //Dynamic IP address get
        $data = \Location::get($ip);
        $resto = DB::table('restoran')->get();

        return view('home', compact('data', 'resto', 'user' , 'cari'));
	}

    public function tambahmenu(Request $request)
    {
        $file = $request->file('file');
        DB::table('menu')->insert([
            'restoran_id' => $request->user_id,
            'nama' => $request->menu,
            'gambar' => $file->getClientOriginalName()
        ]);
        // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';

            // upload file
        $file->move($tujuan_upload,$file->getClientOriginalName());
        return redirect()->back();
    }
}