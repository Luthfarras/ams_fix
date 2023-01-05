<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Distributor;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Distributor::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('distributors')->insert([
                'kode_distributor' => $faker->randomnumber,
                'nama_distributor' => $faker->name,
                'alamat_distributor' => $faker->address,
                'telepon_distributor' => $faker->phonenumber,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
