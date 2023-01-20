<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Satuan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Satuan::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('satuans')->insert([
                'nama_satuan' => $faker->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
