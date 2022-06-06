<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UlasanController extends Controller
{
    //by leo
    
    public function index($id)
    {   
        $review = DB::table('ulasan')->get();
        $user = DB::table('users')->get();
        return view('ulasan.index', compact('id', 'review', 'user'));
    }
    public function tambah($id)
    {
        $ulasan = DB::table('ulasan')->where('id', $id)->get();
        return view('ulasan.tambah', compact('ulasan', 'id'));
    }

    public function store(Request $request)
    {
        DB::table('ulasan')->insert([
            'review' => $request->review,
            'user_id' => $request->user_id,
            'restoran_id' => $request->restoran_id
        ]);
        return redirect()->route('ulasan', ['restoran_id' => $request->restoran_id]);
    }

    public function edit($id)
    {
        $ulasan = DB::table('ulasan')->where('id', $id)->get();
        return view('ulasan.edit', ['ulasan' => $ulasan]);
    }

    public function update(Request $request)
    {
        DB::table('ulasan')->where('id', $request->id)->update([
            
                'review' => $request->review
            
            ]);
        return redirect()->route('ulasan', ['id' => $request->restoran_id]);
        // return dd($request->restoran_id);

    }

    public function hapus($id)
    {
        DB::table('ulasan')->where('id', $id)->delete();
        return redirect()->back();
    }
}