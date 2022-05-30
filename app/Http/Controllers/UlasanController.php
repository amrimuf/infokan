<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UlasanController extends Controller
{
    //by leo
    
    public function index()
    {
        $review = DB::table('ulasan')
        ->join('users', 'ulasan.user_id', '=', 'users.id')
        ->paginate();
        return view('ulasan.index', ['ulasan' => $review]);
    }
    public function tambah()
    {
        return view('ulasan.tambah');
    }

    public function store(Request $request)
    {
        DB::table('ulasan')->insert([
            'review' => $request->review
        ]);
        return redirect('/');
    }

    public function edit($id)
    {
        $ulasan = DB::table('ulasan')->where('id', $id)->get();
        return view('ulasan.edit', ['ulasan' => $ulasan]);
    }

    public function update(Request $request)
    {
        DB::table('ulasan')->where('id', $request->id)->update([
            DB::table('ulasan')->insert([
                'review' => $request->review
            ])
            ]);
            return redirect('/');
    }

    public function hapus($id)
    {
        DB::table('ulasan')->where('id', $id)->delete();
        return redirect('/');
    }
}
