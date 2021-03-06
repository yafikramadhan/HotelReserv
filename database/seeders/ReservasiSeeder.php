<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 1; $i++) {
            DB::table('reservasis')->insert(array(
                'booking_id' => Str::random(8),
                'nama_tamu' => $faker->name,
                'nama_pemesan' => $faker->name,
                'email' => $faker->email,
                'no_tlp' => $faker->phoneNumber,
                'id_kamar' => $faker->numberBetween(1, 3),
                'jumlah_kamar' => '1',
                'permintaan_khusus' => $faker->sentence,
                'total_harga' => $faker->numberBetween(500000, 1000000),
                'tgl_checkin' => $faker->dateTimeBetween('-1 years', '-1 years'),
                'tgl_checkout' => $faker->dateTimeBetween('-1 years', '+1 weeks'),
                'status' => $faker->randomElement(['menunggu checkin', 'checkin', 'checkout', 'batal']),
            ));
        }
    }
}
