<?php

namespace Database\Seeders;
use App\Models\kurir;
use Illuminate\Database\Seeder;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => 'jne','kurir' => 'JNE'],
            ['kode' => 'pos','kurir' => 'POS'],
            ['kode' => 'tiki','kurir' => 'TIKI']
        ];
        kurir::insert($data);
    }
}
