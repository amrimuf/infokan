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
        // $resto = DB::table('users')
        // ->join('restoran', 'users.id', '=', 'restoran.user_id')->where('users.id', $id)->get();
        // $menu = DB::table('menu')->join('restoran', 'restoran.id', '=', 'menu.restoran_id')->where('restoran.user_id', $id)->get();
        $menu = DB::table('menu')->get();
        return view('restoran.detail',  compact('menu', 'resto', 'user', 'id'));
    }
    // galih unfinished
    public function cari(Request $request)
	{

		$cari = $request->cari;


		$users = DB::table('users')
		->where('name','like',"%".$cari."%")
		->paginate();


		return view('home',['users' => $users]);

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

    //by leo
    public function upload(){
		return view('upload');
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required',
			'keterangan' => 'required',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

      	        // nama file
		echo 'File Name: '.$file->getClientOriginalName();
		echo '<br>';

      	        // ekstensi file
		echo 'File Extension: '.$file->getClientOriginalExtension();
		echo '<br>';

      	        // real path
		echo 'File Real Path: '.$file->getRealPath();
		echo '<br>';

      	        // ukuran file
		echo 'File Size: '.$file->getSize();
		echo '<br>';

      	        // tipe mime
		echo 'File Mime Type: '.$file->getMimeType();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';

                // upload file
		$file->move($tujuan_upload,$file->getClientOriginalName());
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
