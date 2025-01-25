<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataSk;
use App\Models\DataSuratMasuk;
use App\Models\DataMemo;
use App\Models\DataIntern;


class AdminController extends Controller
{
    public function index(){
        $title ="Dashboard|e-arsip";
        $name = \DB::table('users')->where ('email', Auth:: user()->email)->first();
        $page ="Dashboard";

        // dd($name);
        // Hitung jumlah data
    $countDataSk = DataSk::join('jenissk', 'datask.jenis_sk', '=', 'jenissk.id')
        ->select('datask.*', 'datask.id as id_datask', 'jenissk.*')
        ->count();

    $countDataSuratMasuk = DataSuratMasuk::join('jenissuratmasuk', 'datasuratmasuk.jenis_surat', '=', 'jenissuratmasuk.id')
        ->select('datasuratmasuk.*', 'datasuratmasuk.id as id_datasuratmasuk', 'jenissuratmasuk.*')
        ->count();

    $countDataMemo = DataMemo::join('jenismemo', 'datamemo.jenis_memo', '=', 'jenismemo.id')
        ->select('datamemo.*', 'datamemo.id as id_datamemo', 'jenismemo.*')
        ->count();

    $countDataIntern = DataIntern::join('jenisintern', 'dataintern.jenis_surat', '=', 'jenisintern.id')
        ->select('dataintern.*', 'dataintern.id as id_dataintern', 'jenisintern.*')
        ->count();
    
        return view('Admin.index', compact('title', 'page', 'name', 'countDataSk', 'countDataSuratMasuk', 'countDataMemo','countDataIntern'));
    }
}
