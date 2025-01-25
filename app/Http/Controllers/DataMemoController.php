<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\DataMemo;
use App\Models\JenisMemo;
use App\Models\History;
use Carbon\Carbon;


class DataMemoController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $datamemo = DataMemo::join('jenismemo', 'datamemo.jenis_memo', '=', 'jenismemo.id')
                ->select('datamemo.*', 'datamemo.id as id_datamemo', 'jenismemo.*')
                ->orderBy('datamemo.jenis_memo')
                ->get();
        
        $title = "Data Data Memo | e-arsip";
        $page = "Data Memo";
        // $datamemo = DataMemo::all();
        $jenis1 = JenisMemo::all();
        return view('Admin.DataMemo.index', compact('title', 'page', 'name', 'datamemo', 'jenis1'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_memo' => 'required|string',
            'tanggal_memo' => 'required|date',
            'perihal' => 'required|string',
            'nama_file' => 'required|mimes:pdf|max:3072',
            'jenis_memo' => 'required',
        ]);

        $file = $request->file('nama_file');

        $datamemo = new DataMemo;
        $datamemo->kode_memo = $request->kode_memo;
        $datamemo->tanggal_memo= $request->tanggal_memo;
        $datamemo->perihal = $request->perihal;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('/upload/memo'), $fileName);
        $datamemo->nama_file = 'upload/memo/' . $fileName;
        $datamemo->jenis_memo = $request->jenis_memo;

        $datamemo->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Tambah Data Memo';
        $history->keterangan = 'Telah Dilakukan Penambahan Data ' .$request->kode_memo;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('datamemo')->with('success', 'Data DataMemo Berhasil Ditambahkan');
    }

    public function editview($id)
    {
        $datamemo = DataMemo::find($id);
        
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $title = "Data DataMemo | e-arsip";
        $page = "Data Memo";

        $jenis1 = JenisMemo::all();
        
        return view('Admin/DataMemo/edit', compact('title', 'page', 'name', 'datamemo','jenis1'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'kode_memo' => 'required|string',
            'tanggal_memo' => 'required|date',
            'perihal' => 'required|string',
            'nama_file' => 'nullable|mimes:pdf|max:3072',
            'jenis_memo' => 'required',
        ]);

        $datamemo = DataMemo::find($id);

        if ($request->hasFile('nama_file')) {
            if ($datamemo->nama_file && file_exists(public_path($datamemo->nama_file))) {
                unlink(public_path($datamemo->nama_file));
            }

            $file = $request->file('nama_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/upload/memo'), $fileName);
            $datamemo->nama_file = 'upload/memo/' . $fileName;        
        }
        $datamemo->kode_memo=$request->kode_memo;
        $datamemo->tanggal_memo=$request->tanggal_memo;
        $datamemo->perihal=$request->perihal;
        // $datamemo->nama_file=$request->nama_file;
        $datamemo->jenis_memo=$request->jenis_memo;

        $datamemo->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Update Data Memo';
        $history->keterangan = 'Telah Dilakukan Update Data ' .$request->kode_memo;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('datamemo')->with('update', 'Data DataMemo Berhasil diupdate');
    }

    public function hapus($id)
    {
        $datamemo = DataMemo::findOrFail($id);

        $datamemo->delete();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Hapus Data Memo';
        $history->keterangan = 'Telah Dilakukan Penambahan Data';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('datamemo')->with('success', 'DataMemo delete successfully');
    }

    public function download($file)
    {
        $filePath = public_path($file);
        $history = new History;
            $history->pengguna = Auth:: user()->id;
            $history->jenis_aksi = 'Dowload Data SK';
            $history->keterangan = 'Telah Dilakukan Pendowloadtan Data ' .$request->kode_memo;
            $history->tanggal = Carbon::now('Asia/Jakarta');
            $history->save();
        dd($filePath);
        // Pastikan file tersebut ada
        if (File::exists($filePath)) {
            return Response::download($filePath);
            
        } else {
            // Jika file tidak ditemukan
            abort(404);
        }
    }
}
