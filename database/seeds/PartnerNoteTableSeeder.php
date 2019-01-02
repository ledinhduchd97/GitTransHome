<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PartnerNoteTableSeeder extends Seeder
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
            DB::table('partner_notes')->insert([
                'content' => 'This is note '. $i ,
                'partner_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
