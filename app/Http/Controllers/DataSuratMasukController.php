<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\DataSuratMasuk;
use App\Models\JenisSuratMasuk;
use App\Models\History;
use Carbon\Carbon;


class DataSuratMasukController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $datasuratmasuk = DataSuratMasuk::join('jenissuratmasuk', 'datasuratmasuk.jenis_surat', '=', 'jenissuratmasuk.id')
                ->select('datasuratmasuk.*', 'datasuratmasuk.id as id_datasuratmasuk', 'jenissuratmasuk.*')
                ->orderBy('datasuratmasuk.jenis_surat')
                ->get();

        $title = "Data Data Surat Masuk | e-arsip";
        $page = "Data Surat Masuk";
        // $datasuratmasuk = DataSuratMasuk::all();

        $jenisSuratMasuk = JenisSuratMasuk::all();
        // $jenis1 = JenisSK::all();
        return view('Admin.DataSuratMasuk.index', compact('title', 'page', 'name', 'datasuratmasuk', 'datasuratmasuk','jenisSuratMasuk'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_suratmasuk' => 'required|string',
            'tanggal_suratmasuk' => 'required|date',
            'perihal' => 'required|string',
            'nama_file' => 'required|mimes:pdf|max:3072',
        ]);

        $file = $request->file('nama_file');

        $datasuratmasuk = new DataSuratMasuk;
        $datasuratmasuk->kode_suratmasuk = $request->kode_suratmasuk;
        $datasuratmasuk->tanggal_suratmasuk = $request->tanggal_suratmasuk;
        $datasuratmasuk->perihal = $request->perihal;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('/upload/suratmasuk'), $fileName);
        $datasuratmasuk->nama_file = 'upload/suratmasuk/' . $fileName;
        $datasuratmasuk->jenis_surat = $request->jenisSuratMasuk;

        $datasuratmasuk->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Tambah Data SuratMasuk';
        $history->keterangan = 'Telah Dilakukan Penambahan Data ' .$request->kode_suratmasuk;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('datasuratmasuk')->with('success', 'Data DataSuratMasuk Berhasil Ditambahkan');
    }

    public function editview($id)
    {
        $datasuratmasuk = DataSuratMasuk::find($id);
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $title = "Data DataSuratMasuk | e-arsip";
        $page = "Data DataSuratMasuk";

        $jenisSuratMasuk = JenisSuratMasuk::all();

        return view('Admin/DataSuratMasuk/edit', compact('title', 'page', 'name', 'datasuratmasuk','jenisSuratMasuk'));
    }

    public function update(Request $request,$id)
    {
        $DataSuratMasuk = DataSuratMasuk::find($id);
        
        $request->validate([
            'kode_suratmasuk' => 'required|string',
            'tanggal_suratmasuk' => 'required|date',
            'perihal' => 'required|string',
            'nama_file' => 'nullable|mimes:pdf|max:3072',
            'jenis_surat' => 'required',
        ]);

        $datasuratmasuk = DataSuratMasuk::find($id);

        if ($request->hasFile('nama_file')) {
            if ($datasuratmasuk->nama_file && file_exists(public_path($datasuratmasuk->nama_file))) {
                unlink(public_path($datasuratmasuk->nama_file));
            }

            $file = $request->file('nama_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/upload/suratmasuk'), $fileName);
            $datasuratmasuk->nama_file = 'upload/suratmasuk/' . $fileName;        
        }
        $datasuratmasuk->kode_suratmasuk=$request->kode_suratmasuk;
        $datasuratmasuk->tanggal_suratmasuk=$request->tanggal_suratmasuk;
        $datasuratmasuk->perihal=$request->perihal;
        // $datasuratmasuk->nama_file=$request->nama_file;
        // $datask->jenis_sk=$request->jenis_sk;
        $datasuratmasuk->jenis_surat=$request->jenis_surat;

        $datasuratmasuk->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Update Data SuratMasuk';
        $history->keterangan = 'Telah Dilakukan update Data ' .$request->kode_suratmasuk;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('datasuratmasuk')->with('update', 'Data DataSuratMasuk Berhasil diupdate');
    }

    public function hapus($id)
    {
        $datasuratmasuk = DataSuratMasuk::findOrFail($id);

        $datasuratmasuk->delete();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Hapus Data SuratMasuk';
        $history->keterangan = 'Telah Dilakukan Penghapusan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('datasuratmasuk')->with('success', 'DataSuratMasuk delete successfully');
    }

    public function download($file)
    {
        $filePath = public_path($file);

        dd($filePath);
        // Pastikan file tersebut ada
        if (File::exists($filePath)) {
            return Response::download($filePath);
            $history = new History;
            $history->pengguna = Auth:: user()->id;
            $history->jenis_aksi = 'Dowload Data SuratMasuk';
            $history->keterangan = 'Telah Dilakukan Pendowloadtan Data ' .$request->kode_suratmasuk;
            $history->tanggal = Carbon::now('Asia/Jakarta');
            $history->save();
        } else {
            // Jika file tidak ditemukan
            abort(404);
        }
    }
}
