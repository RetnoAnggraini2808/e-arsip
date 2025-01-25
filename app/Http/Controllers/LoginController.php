<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;



class LoginController extends Controller
{
    public function index()
    {
        $title= "login e-arsip";
        return view ("login/index", compact('title'));
        }
    public function login(Request $request)
    {
        try {
            $data = [
                'email' => $request->input('username'),
                'password' => $request->input('password')
            ];

            if (Auth::attempt($data)) {
                $user = Auth::user();

                if ($user->is_active == 1) {
                    $request->session()->put('name', $user->name);
                    if ($user->status == 1) {
                        // return redirect('admin')->with('name', $user->name);
                        return redirect('admin')->with('success', 'Selamat datang, ' . $user->name);
                    }else{
                        // return redirect('krani')->with('name', $user->name);
                        return redirect('krani')->with('success', 'Selamat datang, ' . $user->name);
                    }
                }else{
                    Auth::logout(); // Log out the user
                    // Session::flash('error', 'Akun belum diaktifkan. Silakan hubungi administrator.');
                    // return redirect('/');
                    return redirect('/')->with('error', 'Akun belum diaktifkan. Silakan hubungi administrator.');
                }
                # code...
            } else {
                // Session::flash('error', 'Email atau Password Salah');
                // return redirect('/');
                return redirect('/')->with('error', 'Email atau Password salah.');
            }
            //code...
        } catch (QueryException $e) {
            //throw $th;
            // Session::flash('error', 'Error connecting to the database. Please try again later.');
            // return redirect('/');
            return redirect('/')->with('error', 'Error connecting to the database. Silakan coba lagi nanti.');
        }
    }

    public function logout(){
        Auth:: logout();
        // Session:: flash('logout','akun anda sudah logout');
        // return redirect('/logout');
        return redirect('/logout')->with('success', 'Anda berhasil logout.');
    }
}