<?php

use Illuminate\Database\Seeder;

class CustomerTaskToDoTableSeeder extends Seeder
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
            DB::table('customer_task_to_dos')->insert([
                'title' => $faker->jobTitle,
                'customer_id' => rand(1,24),
                // 'age' => rand(16,30),
                // 'update' => rand(1,15),
                'type' => $faker->realText(20),
                'deadline' => $faker->dateTime(),
                // 'status' => rand(0,1),
                'ranking' => rand(0,1),
                'note' => $faker->realText(40),
                'created_at' => $faker->dateTime()
            ]);
        }
    }
}
