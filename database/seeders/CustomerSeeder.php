<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Customer::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){

            // insert data ke table pegawai menggunakan Faker
          DB::table('customers')->insert([
            'kode_customer' => $faker->randomnumber,
            'nama_customer' => $faker->name,
            'alamat_customer' => $faker->address,
            'telepon_customer' => $faker->phonenumber,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);
      }
    }
}
