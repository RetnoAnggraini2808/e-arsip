<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\DataSk;
use App\Models\JenisSK;
use App\Models\History;
use Carbon\Carbon;

class DataSkController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $datask = DataSk::join('jenissk', 'datask.jenis_sk', '=', 'jenissk.id')
                ->select('datask.*', 'datask.id as id_datask', 'jenissk.*')
                ->orderBy('datask.jenis_sk')
                ->get();

        $title = "Data DataSk | e-arsip";
        $page = "Data Sk";
        // $datask = DataSk::all();
        $jeniss = JenisSK::all();
        return view('Admin.DataSk.index', compact('title', 'page', 'name', 'datask', 'jeniss'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi data yang diterima
            $validate = $request->validate([
                'kode_sk' => 'required|string',
                'tanggal_sk' => 'required|date',
                'perihal' => 'required|string',
                'nama_file' => 'required|mimes:pdf|max:3072', // Maks 3MB
                'jenis_sk' => 'required',
            ]);

            // Proses upload file
            $file = $request->file('nama_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/upload/sk'), $fileName);

            // Simpan data ke database
            $datask = new DataSk();
            $datask->kode_sk = $request->kode_sk;
            $datask->tanggal_sk = $request->tanggal_sk;
            $datask->perihal = $request->perihal;
            $datask->nama_file = 'upload/sk/' . $fileName;
            $datask->jenis_sk = $request->jenis_sk;
            $datask->save();

            // Catat ke tabel history
            $history = new History();
            $history->pengguna = Auth::id();
            $history->jenis_aksi = 'Tambah Data SK';
            $history->keterangan = 'Telah Dilakukan Penambahan Data ' . $request->kode_sk;
            $history->tanggal = Carbon::now('Asia/Jakarta');
            $history->save();

            // Redirect dengan pesan sukses
            return redirect()->route('datask')->with('success', 'Data DataSk Berhasil Ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap kesalahan validasi dan kembalikan pesan error
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            if ($e->getMessage() === 'The uploaded file exceeds the upload_max_filesize directive in php.ini') {
                return redirect()->back()->with('error', 'Ukuran file terlalu besar, maksimum 3MB.')->withInput();
            }

            // Tangani error lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function editview($id)
    {
        $DataSk = DataSk::find($id);
        
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $title = "Data Data Sk | e-arsip";
        $page = "Data Sk";

        $jeniss = JenisSK::all();
        
        return view('Admin/DataSk/edit', compact('title', 'page', 'name', 'DataSk','jeniss'));
    }

    public function update(Request $request,$id)
    {
        $datask = DataSk::find($id);
        
        $request->validate([
            'kode_sk' => 'required|string',
            'tanggal_sk' => 'required|date',
            'perihal' => 'required|string',
            'nama_file' => 'nullable|mimes:pdf|max:3072',
            'jenis_sk' => 'required',
        ]);
        
        if ($request->hasFile('nama_file')) {
            if ($datask->nama_file && file_exists(public_path($datask->nama_file))) {
                unlink(public_path($datask->nama_file));
            }
            
            $file = $request->file('nama_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/upload/sk'), $fileName);
            $datask->nama_file = 'upload/sk/' . $fileName;        
        }
        $datask->kode_sk=$request->kode_sk;
        $datask->tanggal_sk=$request->tanggal_sk;
        $datask->perihal=$request->perihal;
        // $datask->nama_file=$request->nama_file;
        $datask->jenis_sk=$request->jenis_sk;
        
        $datask->save();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Update Data SK';
        $history->keterangan = 'Telah Dilakukan update Data ' .$request->kode_sk;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('datask')->with('update', 'DataSk Berhasil diupdate');
    }

    public function hapus($id)
    {
        $datask = DataSk::findOrFail($id);

        $datask->delete();
        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Hapus Data SK';
        $history->keterangan = 'Telah Dilakukan Penghapusan Data';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('datask')->with('success', 'DataSk delete successfully');
    }

    public function downloadFile($fileName)
    {
        // Mengambil path file dari folder 'public/upload/'
        $path = public_path('upload/' . $fileName);

        $history = new History;
            $history->pengguna = Auth:: user()->id;
            $history->jenis_aksi = 'Dowload Data SK';
            $history->keterangan = 'Telah Dilakukan Pendowloadtan Data';
            $history->tanggal = Carbon::now('Asia/Jakarta');
            $history->save();
        // Mengecek apakah file ada
        if (file_exists($path)) {
            return response()->download($path);
            
        } else {
            return redirect()->back()->with('error', 'File not found');
        }
    }
}
