<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data Role | e-arsip";
        $page = "Data Role";
        $role = Role::all();
        return view('Admin.role.index', compact('title', 'page', 'name', 'role'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'role' => 'required'
        ]);
        
        $role = new Role;
        $role->nama_role = $validate['role'];
        $role->save();
        return redirect()->route('role')->with('success', 'Data Role Berhasil Ditambahkan');
    }

    public function editview($id)
    {
        $role = Role::find($id);
        $name = \DB::table('users')->where('email', Auth:: user()->email)->first();
        $title = "Data Role | e-arsip";
        $page = "Data Role";
        return view('Admin/role/edit', compact('title', 'page', 'name', 'role'));
    }

    public function update(Request $request,$id)
    {
        $role = Role::find($id);

        $role->update($request->all());
        return redirect()->route('role')->with('update', 'Data Role Berhasil diupdate');
    }

    public function hapus($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();
        return redirect()->route('role')->with('success', 'Role delete successfully');
    }
}
