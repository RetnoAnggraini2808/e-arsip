<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data User | e-arsip";
        $page = "Data User";

        // $user = User::join('role','users.status','=','role.id')-> select('users.*','users.id as id_users','role.nama_role')->get();

        $user = User::with(['Role'])->get();
        // dd($user);

        $rolee = role:: all();
        return view('Admin.user.index', compact('title', 'page', 'name', 'user','rolee'));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|max:255|unique:users,email',
            'password'=> 'nullable|min:8',
            'status'=> 'required|integer'
        ]);
        $user = new User;
        $user -> name = $validate['name'];
        $user -> email = $validate['email'];
        $user -> password = $validate['password'];
        $user -> status = $validate['status'];
        $user -> is_active = 0;
        $user -> save();

        Session::flash('succes','Data user berhasil diubah');
        return redirect()->route('user')->with('success','Data user berhasil ditambahkan');
    }
    public function edituser($id)
    {
        $user = User::find($id);
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data User | e-arsip";
        $page = "Data User";
        $rolee = role:: all();
        return view('Admin/user/edit', compact('title', 'page', 'name', 'user','rolee'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|max:255|unique:users,email,'.$id,
            'password'=> 'nullable|min:8',
            'status'=> 'required|exists:role,id'
        ]);

        $user = user:: findOrFail($id);

        $user-> name =$request->name;
        $user->email =$request->email;

        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }

        $user->status =$request->status;

        $user->save();
        return redirect()->route('user')->with('success', 'User Update Successsfully');
    }
    public function hapus($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('user')->with('success', 'User delete successfully');
    }
    public function statususer(Request $request,$id)
    {
        $user = User::find($request->id);
        if($user){
            $user->is_active =!$user-> is_active;
            $user->save();
            return redirect()-> route ('user')->with('success','user berhasil diperbarui');
        }
       return redirect()->route('user')->with('error','status gagal diperbarui');
    }
}