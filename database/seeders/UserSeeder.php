<?php

namespace Database\Seeders;

use App\Models\user;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'administrator',
            'email'=>'admin@arsip.co.id',
            'password'=> Hash::make('admin321#'),
            'is_active' => 1,
            'status' => 1,
        ]);

        Role::create([
            'nama_role'=>'Kepala Personalia',
        ]);

        Role::create([
            'nama_role'=>'Krani Personalia',
        ]);
    }
}
