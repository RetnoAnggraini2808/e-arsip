<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\jenis_intern;
use App\Models\DataIntern;
use Carbon\Carbon;

class DataSuratInternController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $datasuratintern = DataIntern::join('jenisintern', 'dataintern.jenis_surat', '=', 'jenisintern.id')
                ->select('dataintern.*', 'dataintern.id as id_dataintern', 'jenisintern.*')
                ->orderBy('dataintern.jenis_surat')
                ->get();

        $title = "Data Surat Intern | e-arsip";
        $page = "Data Surat Intern";
        // $datasuratintern = DataIntern::all();

        $jenisSuratIntern = jenis_intern::all();
        // $jenis1 = JenisSK::all();
        return view('Admin.DataSuratIntern.index', compact('title', 'page', 'name','jenisSuratIntern','datasuratintern'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_suratintern' => 'required|string',
            'tanggal_suratintern' => 'required|date',
            'perihal' => 'required|string',
            'nama_file' => 'required|mimes:pdf|max:3072',
        ]);

        $file = $request->file('nama_file');

        $datasuratintern = new DataIntern;
        $datasuratintern->kode_suratintern = $request->kode_suratintern;
        $datasuratintern->tanggal_suratintern = $request->tanggal_suratintern;
        $datasuratintern->perihal = $request->perihal;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('/upload/suratmasuk'), $fileName);
        $datasuratintern->nama_file = 'upload/suratmasuk/' . $fileName;
        $datasuratintern->jenis_surat = $request->jenis_intern;
        $datasuratintern->save();

        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Tambah Data SuratMasuk';
        $history->keterangan = 'Telah Dilakukan Penambahan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('dataintern')->with('success', 'Data Surat Intern Berhasil Ditambahkan');
    }

    public function hapus($id)
    {
        $datasuratintern = DataIntern::findOrFail($id);

        $datasuratintern->delete();

        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Hapus Data Surat Intern';
        $history->keterangan = 'Telah Dilakukan Penghapusan Data ';
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();
        return redirect()->route('dataintern')->with('success', 'Surat Intern delete successfully');
    }

    public function editview($id)
    {
        $datasuratintern = DataIntern::find($id);
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $title = "Edit Data Surat Intern | e-arsip";
        $page = "Edit Data Surat Intern";

        $jenisSuratIntern = jenis_intern::all();

        return view('Admin/DataSuratIntern/edit', compact('title', 'page', 'name', 'datasuratintern','jenisSuratIntern'));
    }

    public function update(Request $request,$id)
    {
        // $datasuratintern = DataIntern::find($id);
        
        $request->validate([
            'kode_suratintern' => 'required|string',
            'tanggal_suratintern' => 'required|date',
            'perihal' => 'required|string',
            'nama_file' => 'nullable|mimes:pdf|max:3072',
            'jenis_surat' => 'required',
        ]);

        $datasuratintern = DataIntern::find($id);

        if ($request->hasFile('nama_file')) {
            if ($datasuratintern->nama_file && file_exists(public_path($datasuratintern->nama_file))) {
                unlink(public_path($datasuratintern->nama_file));
            }

            $file = $request->file('nama_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/upload/suratmasuk'), $fileName);
            $datasuratintern->nama_file = 'upload/suratmasuk/' . $fileName;        
        }
        $datasuratintern->kode_suratintern=$request->kode_suratintern;
        $datasuratintern->tanggal_suratintern=$request->tanggal_suratintern;
        $datasuratintern->perihal=$request->perihal;
        // $datasuratintern->nama_file=$request->nama_file;
        // $datask->jenis_sk=$request->jenis_sk;
        $datasuratintern->jenis_surat=$request->jenis_surat;
        $datasuratintern->save();

        $history = new History;
        $history->pengguna = Auth:: user()->id;
        $history->jenis_aksi = 'Update Data Surat Intern';
        $history->keterangan = 'Telah Dilakukan update Data ' .$request->kode_suratintern;
        $history->tanggal = Carbon::now('Asia/Jakarta');
        $history->save();

        return redirect()->route('dataintern')->with('success', 'Data Data Surat Intern Berhasil diupdate');
    }
}
