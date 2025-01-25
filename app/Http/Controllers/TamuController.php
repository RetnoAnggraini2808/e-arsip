<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TamuController extends Controller
{
    public function index()
    {
        $title ="Tamu|e-arsip";
        // $name = \DB::table('users')->where ('email', Auth:: user()->email)->first();
        $page ="Tamu";

        // dd($name);

        return view('Tamu.index', compact ('title', 'page'));
    }

    public function pengajuan()
    {
        $title ="Tamu|e-arsip";
        // $name = \DB::table('users')->where ('email', Auth:: user()->email)->first();
        $page ="Tamu";

        // dd($name);

        return view('Tamu.pengajuan', compact ('title', 'page'));
    }

    public function tracking()
    {
        $title ="Tamu|e-arsip";
        // $name = \DB::table('users')->where ('email', Auth:: user()->email)->first();
        $page ="Tamu";

        // dd($name);

        return view('Tamu.tracking', compact ('title', 'page'));
    }
}
