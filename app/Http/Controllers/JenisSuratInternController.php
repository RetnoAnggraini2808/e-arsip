<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\jenis_intern;
use App\Models\History;

use Carbon\Carbon;

class JenisSuratInternController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data Jenis Intern | e-arsip";
        $page = "Data Jenis Intern ";
        $jenisSuratIntern = jenis_intern::all();
        return view('Admin.JenisIntern.index', compact('title','jenisSuratIntern','page', 'name'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenisintern' => 'required'
        ]);
        
        $jenisSuratIntern = new jenis_intern;
        $jenisSuratIntern->jenis_intern = $validate['jenisintern'];
        $jenisSuratIntern->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Tambah Data JenisSuratIntern';
        $history->keterangan = 'Telah Dilakukan Penambahan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('JenisSuratIntern')->with('success', 'Data Jenis Surat Masuk Berhasil Ditambahkan');
    }
    public function hapus($id)
    {
        $jenisSuratIntern = jenis_intern::findOrFail($id);

        $jenisSuratIntern->delete();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Hapus Data JenisSuratIntern';
        $history->keterangan = 'Telah Dilakukan Penghapusan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('JenisSuratIntern')->with('success', 'Jenis Surat Masuk delete successfully');
    }
    public function editview($id)
    {
        $jenisSuratIntern = jenis_intern::find($id);
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Edit Jenis Surat Intern | e-arsip";
        $page = "Edit Data Jenis Surat Intern";;
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Edit Data JenisSuratIntern';
        $history->keterangan = 'Telah Dilakukan Pengeditan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return view('Admin.JenisIntern.edit', compact('title','jenisSuratIntern', 'page', 'name'));
    }
    public function update(Request $request,$id)
    {
        // $jenisSuratMasuk = JenisSuratMasuk::find($id);

        $request->validate([
            'jenisintern' => 'required'
        ]);

        $jenisSuratIntern = jenis_intern::findOrFail($id);
        $jenisSuratIntern->jenis_intern = $request['jenisintern'];
        $jenisSuratIntern->save();

        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Update Data JenisSuratIntern';
        $history->keterangan = 'Telah Dilakukan update Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('JenisSuratIntern')->with('update', 'Data Jenis Surat Intern Berhasil diupdate');
    }
}