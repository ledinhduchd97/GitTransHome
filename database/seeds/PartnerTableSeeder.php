<?php

use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 25;

        for($i = 0; $i < $limit; $i++) {
            DB::table('partners')->insert([
                'fullname' => $faker->name,
                'email' => $faker->unique()->email,
                'phone' => $faker->phoneNumber,
                'created_at' => $faker->dateTime,
                'status' => '-',
                'status_recycle' => 1
            ]);
        }
    }
}
