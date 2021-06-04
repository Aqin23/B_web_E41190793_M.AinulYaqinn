<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB,
    App\Http\Controllers\Controller;
use App\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    public function index(){
        $pengalaman_kerja = PengalamanKerja::all();
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }
    public function create()  {
        $pengalaman_kerja = null;
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }
     public function store(Request $request){
        DB::table('pengalaman_kerja')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja telah berhasil disimpan.');
    }
    public function edit($id)
    {
        $pengalaman_kerja = PengalamanKerja::where('id', $id)->first();
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }
    public function update(Request $request)
    {
        PengalamanKerja::where('id', $request->id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ]);
        return redirect()->route('pengalaman_kerja.index')->with('success', 'Pengalaman Kerja Berhasil Diperbarui');
    }
    public function destroy($id)
    {
        PengalamanKerja::where('id', $id)->delete();
        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data Pengalaman Kerja Dihapus!');
    }
}