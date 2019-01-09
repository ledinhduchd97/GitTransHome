<?php

use Illuminate\Database\Seeder;

class TableInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 4 ; $i++) { 
        	DB::table('table_infos')->insert([
            'column_1' => $faker->realText(50),
            'column_2' => $faker->realText(50),
            'column_3' => $faker->realText(50),
        ]);	
        }
        
    }
}
