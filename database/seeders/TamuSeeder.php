<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 100; $i++) {
            DB::table('tamus')->insert(array(
                'nama' => $faker->name,
                'nama_pemesan' => $faker->name,
                'email' => $faker->email,
                'no_tlp' => $faker->phoneNumber,
            ));
        }
    }
}
