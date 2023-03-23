<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            'nomor_induk' => 11117052,
            'nama' => 'Aldi Putra Nawasta',
            'alamat' => 'Cilegon',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('siswa')->insert([
            'nomor_induk' => 11117053,
            'nama' => 'Eliza Alya Safira',
            'alamat' => 'Cilegon',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('siswa')->insert([
            'nomor_induk' => 11117054,
            'nama' => 'Rofianan',
            'alamat' => 'Serang',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
