<?php

use Illuminate\Database\Seeder;

class SetUpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('set_ups')->insert([
            'website_name' => 'transhome.com',
            'description' => $faker->realText(50),
            'logo_header' => 'https://via.placeholder.com/150',
            'logo_footer' => 'https://via.placeholder.com/150',
            'thank_you' => 'We have received you information. We will get back to you as soon as possible. If you’d like to speak to someone immediately, please call our office at (949) 682-3437.',
            'sell_my_home' => 'Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp',
            'phone' => $faker->e164PhoneNumber,
            'email' => $faker->unique()->email,
            'lisence' => 'This is my lisence',
            'address' => $faker->address,
            'facebook' => 'https://www.fb.me/Anonsn0r4',
            'instagram' => 'https://www.instagram.com/minhnora98',
            'twitter' => 'https://www.twitter.com/minhnora98',
            'created_at' => $faker->dateTime
        ]);
    }
}
