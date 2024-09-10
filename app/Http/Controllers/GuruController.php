<?php

namespace App\Http\Controllers;

use App\Models\dataGuru;
use Illuminate\Http\Request;
use PDF;

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
            'nik' => 'required',
            'ttl' => 'required',
            'guruMapel' => 'required',
            'jenisKelamin' => 'required',
            'pendidikan' => 'required',
        ], [
            'name.required' => 'Nama Guru tidak boleh kosong',
            'nik.required' => 'NIK tidak boleh kosong',
            'ttl.required' => 'Tempat, Tanggal Lahir tidak boleh kosong',
            'guruMapel.required' => 'Guru Mapel tidak boleh kosong',
            'jenisKelamin.required' => 'Jenis Kelamin tidak boleh kosong',
            'pendidikan.required' => 'Pendidikan tidak boleh kosong'
        ]);

        dataGuru::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'ttl' => $request->ttl,
            'guruMapel' => $request->guruMapel,
            'jenisKelamin' => $request->jenisKelamin,
            'pendidikan' => $request->pendidikan,
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
            'nik' => 'required|string|max:255',
            'ttl' => 'required|string|max:255',
            'guruMapel' => 'required|string|max:255',
            'jenisKelamin' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',

        ]);
        dataGuru::findOrFail($id)->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'ttl' => $request->ttl,
            'guruMapel' => $request->guruMapel,
            'jenisKelamin' => $request->jenisKelamin,
            'pendidikan' => $request->pendidikan,

        ]);
        return redirect('/guru')->with('success', 'Data berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $dataGuru = dataGuru::findOrFail($id);
        $dataGuru->delete();

        return redirect('/guru')->with('success', 'Data berhasil dihapus.');
    }
    public function generatePDF($id)
    {
        $dataGuru = dataGuru::findOrFail($id);
        $image_path = public_path('dist/img/pdf/Picture1.png');
        $tahun_penilaian = date('Y');

        $pdf = PDF::loadView('pdf.template', compact('dataGuru', 'image_path', 'tahun_penilaian'));

        return $pdf->download('Profile Guru.pdf');
    }
    // DataGuruController.php

    public function index(Request $request)
    {
        $query = $request->input('search');
        $dataGuru = dataGuru::where('name', 'like', "%$query%")->get();

        return view('dataGuru.guru', compact('dataGuru'));
    }


}
