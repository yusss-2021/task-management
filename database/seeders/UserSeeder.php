<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRoleId = DB::table('roles')->where('name', 'admin')->value('role_id');
        $userRoleId  = DB::table('roles')->where('name', 'user')->value('role_id');

        $design      = DB::table('divisions')->where('name', 'design')->value('division_id');
        $pembelian   = DB::table('divisions')->where('name', 'pembelian')->value('division_id');
        $penjahit    = DB::table('divisions')->where('name', 'penjahit')->value('division_id');
        $pengemasan  = DB::table('divisions')->where('name', 'pengemasan')->value('division_id');

        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRoleId,
            'division_id' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Divisi
        DB::table('users')->insert([
            [
                'name' => 'User Design',
                'email' => 'design@example.com',
                'password' => Hash::make('password'),
                'role_id' => $userRoleId,
                'division_id' => $design,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'User Pembelian',
                'email' => 'pembelian@example.com',
                'password' => Hash::make('password'),
                'role_id' => $userRoleId,
                'division_id' => $pembelian,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'User Penjahit',
                'email' => 'penjahit@example.com',
                'password' => Hash::make('password'),
                'role_id' => $userRoleId,
                'division_id' => $penjahit,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'User Pengemasan',
                'email' => 'pengemasan@example.com',
                'password' => Hash::make('password'),
                'role_id' => $userRoleId,
                'division_id' => $pengemasan,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
