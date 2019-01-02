<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i< 5 ; $i++)
        {
            DB::table('houses')->insert([
                'code' => 'TH00'.$i,
                'user_id' => 1,
                'name' => 'Home in LA',
                'address' => 'Ha Noi, Viet Nam',
                'number_bedroom' => 6,
                'number_bathroom' => 9,
                'area_gross_floor' => 200,
                'site_area' => 300,
                'price' => '100.000',
                'description' => 'Day la mot ngoi nha cua TransHome',
                'phone' => '0123456789',
                'area' => 'Arab Saudi',
                'zipcode' => '1111111',
                'builded_year' => '19950105',
                'video' => 'https://www.youtube.com/watch?v=oqmK3xLXw9c',
                'note' => 'Fixer Upper',
                'brokerage' => 'Luong',
                'mls' => 'Luong',
                'agent' => 'Luong',
                'unit' => '0',
                'license' => '123asdasasd',
                'status' => 1,
                'active_status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
