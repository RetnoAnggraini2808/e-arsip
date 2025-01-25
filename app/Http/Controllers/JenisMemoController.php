<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\JenisMemo;
use App\Models\History;
use Carbon\Carbon;

class JenisMemoController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data Jenis Memo | e-arsip";
        $page = "Data Jenis Memo";
        $jenismemo = JenisMemo::all();
        return view('Admin.jenismemo.index', compact('title', 'page', 'name', 'jenismemo'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenismemo' => 'required'
        ]);
        
        $jenismemo = new JenisMemo;
        $jenismemo->nama_jenismemo = $validate['jenismemo'];
        $jenismemo->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Tambah Data JenisMemo';
        $history->keterangan = 'Telah Dilakukan Penambahan Data ' .$request->kode_jenismemo;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenismemo')->with('success', 'Data JenisMemo Berhasil Ditambahkan');
    }

    public function editview($id)
    {
        $jenismemo = JenisMemo::find($id);
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data JenisMemo | e-arsip";
        $page = "Data Jenis Memo";

        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Edit Data JenisMemo';
        $history->keterangan = 'Telah Dilakukan Pengeditan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return view('Admin/jenismemo/edit', compact('title', 'page', 'name', 'jenismemo'));
    }

    public function update(Request $request,$id)
    {
        $jenismemo = JenisMemo::find($id);

        $jenismemo->update($request->all());
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Update Data JenisMemo';
        $history->keterangan = 'Telah Dilakukan update Data ' .$request->kode_jenismemo;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenismemo')->with('update', 'Data JenisMemo Berhasil diupdate');
    }

    public function hapus($id)
    {
        $jenismemo = JenisMemo::findOrFail($id);

        $jenismemo->delete();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Hapus Data JenisMemo';
        $history->keterangan = 'Telah Dilakukan Penghapusan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('jenismemo')->with('success', 'JenisMemo delete successfully');
    }
}
