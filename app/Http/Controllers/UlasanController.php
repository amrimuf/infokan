<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UlasanController extends Controller
{
    //by leo
    
    public function index($id)
    {   
        $review = DB::table('ulasan')
        ->join('users', 'ulasan.user_id', '=', 'users.id')
        ->where('restoran_id', $id)->get();
        return view('ulasan.index', ['ulasan' => $review]);
    }
    public function tambah($id)
    {
        $review = DB::table('ulasan')
        ->join('users', 'ulasan.user_id', '=', 'users.id')
        ->where('restoran_id', $id)->get();
        return view('ulasan.tambah', ['ulasan' => $review]);
    }

    public function store(Request $request)
    {
        DB::table('ulasan')->insert([
            'review' => $request->review
        ]);
        return redirect('/ulasan');
    }

    public function edit($id)
    {
        $ulasan = DB::table('ulasan')->where('user_id', $id)->get();
        return view('ulasan.edit', ['ulasan' => $ulasan]);
    }

    public function update(Request $request)
    {
        DB::table('ulasan')->where('restoran_id', $request->id)->update([
            
                'review' => $request->review
            
            ]);
            return redirect('/ulasan');
    }

    public function hapus($id)
    {
        DB::table('ulasan')->where('user_id', $id)->delete();
        return redirect()->back();
    }
}