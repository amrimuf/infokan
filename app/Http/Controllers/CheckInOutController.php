<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckInOutController extends Controller
{
    //by leo
    // public function tambah()
    // {
    //     return view('checkinout');
    // }

    // public function store()
    // {
    //     $resto = DB::table('check_in_out')
    //     ->insert([
    //         'check_in' => $request->checkin,
    //         'check_out' => $request->checkout,
    //     ]);
    //     return redirect('/checkinout');
    // }
    // public function detail($id)
    // {
    //     $users = DB::table('users')
    //     ->join('check_in_out', 'users.id', '=', 'check_in_out.user_id')->where('users.id', $id)->get();
    //     //$resto = DB::table('resto')
    //     //->join('check_in_out', 'check_in_out.id', '=', 'restoran.checkinout_id')->where('restoran.checkinout_id', $id)->get();
    //     return view('checkinout', ['users' => $users]);
    // }

    
}
