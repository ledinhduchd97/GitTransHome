<?php

use Illuminate\Database\Seeder;

class Page_IndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_indices')->insert([
        	'sell_content_question' => 'Need to Sell your House Fast?',
            'sell_content_title' => 'Get a competitive offer for your house,as-is. No repairs, no fees.',
            'sell_content_btn' => 'Get Your Free Cash Offer Now',
            'about_us_title' => 'About Us',
            'about_us_subtitle' => '3F Group chúng tôi là ai ?',
            'about_us_des' => '3F Group là công ty chuyên cung cấp các giải pháp về phần mềm trên nền Web và tư vấn thiết kế Website theo yêu cầu. Với mục tiêu giúp đỡ các doanh nghiệp gia tăng doanh số bán hàng cùng với sự chuyên nghiệp hóa và hiện đại hóa.
                3F Group đem đến cho bạn?
                Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp',
            'partner_title' => 'Partner Of Tranhomes',
            'partner_subtitle' => 'Bạn có muốn tham gia với chúng tôi',
            'partner_des' => '3F Group đem đến cho bạn?
                Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp',
            'partner_menu__title_1' => '3F Group đem đến cho bạn?',
            'partner_menu__des_1' => '3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp',
            'partner_menu__title_2' => '3F Group đem đến cho bạn?',
            'partner_menu__des_2' => '3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp'
        ]);
    }
}
