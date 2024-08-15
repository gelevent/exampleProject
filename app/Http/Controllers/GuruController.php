<?php

namespace App\Http\Controllers;

use App\Models\dataGuru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function tampil()
    {
        $dataGuru = dataGuru::get();
        return view('dataGuru.guru', compact('dataGuru'));
    }

    public function send(Request $request)
    {
        // dd($request->all);
        $request->validate([
            'name' => 'required',
            'gelar' => 'required',
        ], [
            'name.required' => 'Nama Guru tidak boleh kosong',
            'gelar.required' => 'Nama Gelar tidak boleh kosong',
         ]);

        dataGuru::create([
            'name' => $request->name,
            'gelar' => $request->gelar,
            'role' => $request->role,
            'guruMapel' => $request->guruMapel,
        ]);

        return redirect('/guru')->with('success', 'Data Berhasil ditambah');
    }


    public function edit($id)
    {
        $dataGuru = dataGuru::findOrFail($id);
        return view('dataGuru.edit', compact('dataGuru'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gelar' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'guruMapel' => 'required|string|max:255',

        ]);
        dataGuru::findOrFail($id)->update([
            'name' => $request->name,
            'gelar' => $request->gelar,
            'role' => $request->role,
            'guruMapel' => $request->guruMapel,

        ]);
        return redirect('/guru')->with('success', 'Data berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $dataGuru = dataGuru::findOrFail($id);
        $dataGuru->delete();

        return redirect('/guru')->with('success', 'Data berhasil dihapus.');
    }
}
