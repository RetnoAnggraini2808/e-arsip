<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\JenisSK;
use App\Models\History;
use Carbon\Carbon;

class JenisSKController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data Jenis SK | e-arsip";
        $page = "Data Jenis SK";
        $jenissk = JenisSK::all();
        return view('Admin.jenissk.index', compact('title', 'page', 'name', 'jenissk'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenissk' => 'required'
        ]);
        
        $jenissk = new JenisSK;
        $jenissk->nama_jenissk = $validate['jenissk'];
        $jenissk->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Tambah Data JenisSK';
        $history->keterangan = 'Telah Dilakukan Penambahan Data ' .$request->kode_jenissk;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenissk')->with('success', 'Data JenisSK Berhasil Ditambahkan');
    }

    public function editview($id)
    {
        $jenissk = JenisSK::find($id);
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data Jenis SK | e-arsip";
        $page = "Data Jenis SK";
        // $history = new History;
        // $history->pengguna = Auth:: user()->id;
        // $history->jenis_aksi = 'Edit Data JenisSK';
        // $history->keterangan = 'Telah Dilakukan Pengeditan Data ' .$request->kode_jenissk;
        // $history->tanggal = Carbon::now('Asia/Jakarta');
        // $history->save();
        return view('Admin/jenissk/edit', compact('title', 'page', 'name', 'jenissk'));
    }

    public function update(Request $request,$id)
    {
        $jenissk = JenisSK::find($id);

        $jenissk->update($request->all());
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Update Data JenisSK';
        $history->keterangan = 'Telah Dilakukan update Data ' .$request->kode_jenissk;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenissk')->with('update', 'Data JenisSK Berhasil diupdate');
    }

    public function hapus($id)
    {
        $jenissk = JenisSK::findOrFail($id);

        $jenissk->delete();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Hapus Data JenisSK';
        $history->keterangan = 'Telah Dilakukan Penghapusan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenissk')->with('success', 'JenisSK delete successfully');
    }
}
