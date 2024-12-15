<?php

namespace Database\Seeders;

use App\Models\UsersModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        UsersModel::create([
            'nama' => 'Admin',
            'email' => 'a@gmail.com',
            'alamat' => 'Jalan Mentari Raya Nomor 123, Perumahan Harmoni Indah, Jakarta Selatan 12345',
            'gaji' => '1000000',
            'tanggal_lahir' => '2000-01-01',
            'nohp' => '081234567890',
            'id_role' => 1,
            'id_department' => 1,
            'status' => 0,
            'password' => Hash::make('admin')
        ]);
    }
}