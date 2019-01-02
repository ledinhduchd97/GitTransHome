<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TasktodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 1 ; $i< 5 ; $i++)
        {
            DB::table('tasktodos')->insert([
                'title' => 'Cong viec '.$i,
                // 'customer_name' => 'Đức Đẹp Trai',
                'customer_id' => $i,
                'to_do_type' => 'Di lam viec quan trong',
                'start_task' => (new Carbon())->addDays(mt_rand(1,10)),
                'duration' => $faker->dateTimeBetween('-1 years'),
                'deadline' => (new Carbon())->addDays(mt_rand(11,31)),
                'note' => 'Khách hàng khó tính',
                'ranking' => 0,
                'status' => 0,
                'assigned' => 'Tranhomes',
                'age' => '0',
                // 'update' => '0',
                'created_at' => $faker->dateTime
            ]);
        }
    }
}
