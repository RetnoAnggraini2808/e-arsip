<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisSuratMasuk;

use Illuminate\Http\Request;
use App\Models\History;
use Carbon\Carbon;

class jenisSuratMasukController extends Controller
{
    //
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data Jenis Surat Masuk | e-arsip";
        $page = "Data Jenis Surat Masuk";

        $jenisSuratMasuk = JenisSuratMasuk::all();

        return view('Admin.jenisSuratMasuk.index', compact('title', 'page', 'name','jenisSuratMasuk'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenisSuratMasuk' => 'required'
        ]);
        
        $jenisSuratMasuk = new JenisSuratMasuk;
        $jenisSuratMasuk->nama_suratmasuk = $validate['jenisSuratMasuk'];
        $jenisSuratMasuk->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Tambah Data JenisSuratMasuk';
        $history->keterangan = 'Telah Dilakukan Penambahan Data ' .$request->kode_jenissuratmasuk;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenisSuratMasuk')->with('success', 'Data Jenis Surat Masuk Berhasil Ditambahkan');
    }

    public function editview($id)
    {
        $jenisSuratMasuk = JenisSuratMasuk::find($id);
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Edit Jenis Surat Masuk | e-arsip";
        $page = "Edit Data Jenis Surat Masuk";;
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Edit Data JenisSuratMasuk';
        $history->keterangan = 'Telah Dilakukan Pengeditan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return view('Admin.jenisSuratMasuk.edit', compact('title', 'page', 'name', 'jenisSuratMasuk'));
    }

    public function update(Request $request,$id)
    {
        // $jenisSuratMasuk = JenisSuratMasuk::find($id);

        $request->validate([
            'jenisSuratMasuk' => 'required'
        ]);

        $jenisSuratMasuk = JenisSuratMasuk::findOrFail($id);
        $jenisSuratMasuk->nama_suratmasuk = $request['jenisSuratMasuk'];
        $jenisSuratMasuk->save();

        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Update Data JenisSuratMasuk';
        $history->keterangan = 'Telah Dilakukan update Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenisSuratMasuk')->with('update', 'Data Jenis Surat Masuk Berhasil diupdate');
    }

    public function hapus($id)
    {
        $jenisSuratMasuk = JenisSuratMasuk::findOrFail($id);

        $jenisSuratMasuk->delete();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Hapus Data JenisSuratMasuk';
        $history->keterangan = 'Telah Dilakukan Penghapusan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenisSuratMasuk')->with('success', 'Jenis Surat Masuk delete successfully');
    }

}
