<?php

use Illuminate\Database\Seeder;

class AboutusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aboutuses')->insert([
            'title' => 'About Us',
            'short_description' => '3F Group chúng tôi là ai ?',
            'detail_description' => '3F Group là công ty chuyên cung cấp các giải pháp về phần mềm trên nền Web và tư vấn thiết kế Website theo yêu cầu. Với mục tiêu giúp đỡ các doanh nghiệp gia tăng doanh số bán hàng cùng với sự chuyên nghiệp hóa và hiện đại hóa. 3F Group đem đến cho bạn? Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp',
            'image_avatar' => 'frontend/images/person_img1.png',
            'image_signature' => 'frontend/images/chuki.png',
        ]);
    }
}
