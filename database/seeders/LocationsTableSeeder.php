<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kurir;
use App\Models\provinsi;
use App\Models\kota;
use Kavist\RajaOngkir\Facades\RajaOngkir;
class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarprovinsi = RajaOngkir::provinsi()->all();
        foreach($daftarprovinsi as $daftar){
            provinsi::create([
                'provinsi_id' => $daftar['province_id'],
                'provinsi' => $daftar['province']
            ]);
            $daftarkota = RajaOngkir::kota()->dariProvinsi($daftar['province_id'])->get();
            foreach($daftarkota as $dk){
                kota::create([
                    'provinsi_id' => $daftar['province_id'],
                    'kota_id' => $dk['city_id'],
                    'kota' => $dk['city_name']
                ]);
            }
        }
    }
}
