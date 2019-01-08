<?php

use Illuminate\Database\Seeder;

class SellmyhomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('sellmyhomes')->insert([
            'note' => 'We pay cash to you immediately',
            'title_1' => 'How we buy Houses For Cash in the Los Angeles Area',
            'description_1' => 'Three simple steps to getting you cash for your house...',
            'image_1' => 'frontend/images/free-cash-img1.png',
            'title_image_1' => 'Fill out a form or call',
            'description_image_1' => 'To get started, fill out the quick form on this website or just call us. We" ll then take the info and start our research.',
            'image_2' => 'frontend/images/free-cash-img2.png',
            'title_image_2' => 'Get a fair offer FAST',
            'description_image_2' => "We’ll get you a fair offer in as little as 48 hours (or after inspection of the property).",
            'image_3' => 'frontend/images/free-cash-img3.png',
            'title_image_3' => 'Close and get paid!',
            'description_image_3' => 'If you like our offer , you pick a closing date that suits you. Thats It! And remember - you never pay frees or commissions.',
            'title_2' => 'Selling To On Faith Properties LLC vs. Listing With A Local California Agent',
            'description_2' => $faker->realText(200),
            'created_at' => $faker->dateTime
        ]);
    }
}
