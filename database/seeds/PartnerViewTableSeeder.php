<?php

use Illuminate\Database\Seeder;

class PartnerViewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partner_views')->insert([
            'title' => 'Partner Of Tranhomes',
            'short_desc' => 'Bạn có muốn tham gia với chúng tôi ? ',
            'detail_desc' => '3F Group đem đến cho bạn? Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp',
            'image_avatar' => 'frontend/images/person_img2.png',
        ]);
    }
}
