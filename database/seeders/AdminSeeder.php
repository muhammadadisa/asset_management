<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'jabatan' => Str::random(20),
            'nomer_handphone' => Str::random(10),
            'password' => Hash::make('password')
        ]);
    }
}
