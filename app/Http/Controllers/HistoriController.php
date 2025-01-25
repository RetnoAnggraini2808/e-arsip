<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\History;

class HistoriController extends Controller
{
    //
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();

        $histories = History::join('users as b', 'b.id', '=', '_history.pengguna')
            ->select('_history.*', 'b.*') // Adjust what you want to select
            ->orderBy('_history.tanggal', 'desc')
            ->get();
        $title = "Data Histori | e-arsip";
        $page = "Data Histori";
        return view('Admin.Histori.index', compact('title', 'page', 'name', 'histories'));
    }
}
