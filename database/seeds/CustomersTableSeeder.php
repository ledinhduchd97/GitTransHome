<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
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
            DB::table('customers')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => str_random(5). "@gmail.com",
                'phone' => "(".rand(111,999).")".rand(1111111,9999999),
                'address' => $faker->address,
                'birthday' => $faker->dateTimeBetween('-15 years'),
                // 'note' => $faker->realText(50),
                'created_at' => $faker->dateTime
            ]);
        }
    }
}
