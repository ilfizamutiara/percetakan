<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Ilfiza Mutia Rahmi',
            'email' => 'ilfiza.mutiara@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $percetakan = User::create([
            'name' => 'Tiga Putra Printing',
            'email' => 'tigaputradigital@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $percetakan->assignRole('Percetakan');

        $pelanggan = User::create([
            'name' => 'Iffa',
            'email' => 'iffa@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $pelanggan->assignRole('pelanggan');
    }
}
