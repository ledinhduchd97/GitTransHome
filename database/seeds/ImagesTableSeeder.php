<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'house_id' => '1',
            'link' => 'frontend/images/bigSlider1.png',
            'level' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('images')->insert([
            'house_id' => '1',
            'link' => 'frontend/images/video_slider_img1.png',
            'level' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('images')->insert([
            'house_id' => '1',
            'link' => 'frontend/images/other_apartiment_img.png',
            'level' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('images')->insert([
            'house_id' => '2',
            'link' => 'frontend/images/bigSlider1.png',
            'level' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('images')->insert([
            'house_id' => '2',
            'link' => 'frontend/images/video_slider_img1.png',
            'level' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('images')->insert([
            'house_id' => '2',
            'link' => 'frontend/images/other_apartiment_img.png',
            'level' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'house_id' => '3',
            'link' => 'frontend/images/bigSlider1.png',
            'level' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('images')->insert([
            'house_id' => '3',
            'link' => 'frontend/images/video_slider_img1.png',
            'level' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('images')->insert([
            'house_id' => '3',
            'link' => 'frontend/images/other_apartiment_img.png',
            'level' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'house_id' => '4',
            'link' => 'frontend/images/bigSlider1.png',
            'level' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('images')->insert([
            'house_id' => '4',
            'link' => 'frontend/images/video_slider_img1.png',
            'level' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('images')->insert([
            'house_id' => '4',
            'link' => 'frontend/images/other_apartiment_img.png',
            'level' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


    }
}
