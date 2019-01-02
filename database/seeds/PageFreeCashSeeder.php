<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PageFreeCashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_freecashes')->insert([
            'form_information_title_h3' => 'How we buy Houses For Cash in the Los Angeles Area',
            'form_information_title_h4' => 'Three simple steps to getting you cash for your house...',
            'how_we_item_title_1' => 'Fill out a form or call',
            'how_we_item_desc_1' => 'To get started, fill out the quick form on this website or just call us. We" ll then take the info and start our research.',
            "how_we_item_title_2" => 'Get a fair offer FAST',
            'how_we_item_desc_2' => 'We’ll get you a fair offer in as little as 48 hours (or after inspection of the property).',
            'how_we_item_title_3' => 'Close and get paid!',
            'how_we_item_desc_3' => 'If you like our offer , you pick a closing date that suits you. Thats It! And remember - you never pay frees or commissions.',
            'how_we_table_title' => 'Selling To On Faith Properties LLC vs. Listing With A Local California Agent',
            'how_we_table_desc' => 'Phần mềm: 3F Group chuyên cung cấp các giải pháp về Phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp, phần mềm trên nền Web với sự tiện dụng và chuyên nghiệp',
            'modal_map_title' => 'Got it!',
            'modal_map_desc' => 'Enter your info Here !',
            'modal_thanks_title' => 'Thanks You!',
            'modal_thanks_desc' => 'We have received you information. We will get back to you as soon as possible. If you’d like to speak to someone immediately, please call our office at ',
            'modal_thanks_phone' => '(949) 682-3437',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
