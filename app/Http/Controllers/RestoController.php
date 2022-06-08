<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestoController extends Controller
{
    public function add()
    {
        return view('restoran.addrestoran');
    }

    public function store(Request $request)
    {
        DB::table('restoran')->insert([
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kategori' => $request->kategori,
            'user_id' => $request->user_id
        ]);
        return redirect('/');
    }

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

    public function delete($id)
    {
        DB::table('restoran')->where('id', $id)->delete();
        return redirect()->back();
    }

}
