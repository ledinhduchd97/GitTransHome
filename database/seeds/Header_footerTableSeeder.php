<?php

use Illuminate\Database\Seeder;

class Header_footerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header_footers')->insert([
        	'phone' => '(906) 678-6789',
            'email' => 'ledinhduchd97',
            'description' => '3F Group cam kết tư vấn và thiết kế cho khách hàng một sản phẩm chất lượng, chuyên nghiệp, hiện đại và tối ưu nhất.',
            'address' => '14 xóm Đình - Minh Khai
            Bắc Từ Liêm, Hà Nội'
        ]);
    }
}
