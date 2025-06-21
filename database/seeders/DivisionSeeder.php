<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('divisions')->insert([
            ['name' => 'design'],
            ['name' => 'pembelian'],
            ['name' => 'penjahit'],
            ['name' => 'pengemasan'],
        ]);
    }
}
