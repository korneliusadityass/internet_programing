<?php

namespace Database\Seeders;

use App\Models\department;
use App\Models\User;
use App\Models\role;
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
        User::create([
            'nama' => 'Admin',
            'email' => 'a@gmail.com',
            'alamat' => 'Jalan Mentari Raya Nomor 123, Perumahan Harmoni Indah, Jakarta Selatan 12345',
            'gaji' => '1000000',
            'tanggal_lahir' => '2000-01-01',
            'nohp' => '081234567890',
            'id_role' => 1,
            'id_department' => 1,
            'status' => 1,
            'password' => Hash::make('admin')
        ]);

        Role::create(['nama' => 'Admin']);
        Role::create(['nama' => 'HR']);
        Role::create(['nama' => 'Manager']);
        Role::create(['nama' => 'Pegawai']);
        Role::create(['nama' => 'Guest']);

        department::create(['nama' => 'All']);
        department::create(['nama' => 'Perikanan']);
        department::create(['nama' => 'Pertenakan']);
        department::create(['nama' => 'Pertanian']);
        department::create(['nama' => 'Perkebunan']);
    }
}
