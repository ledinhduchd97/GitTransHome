<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(HousesTableSeeder::class);
        $this->call(Header_footerTableSeeder::class);
        $this->call(Page_IndexSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(PageFreeCashSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(AboutusTableSeeder::class);
        $this->call(SetUpsTableSeeder::class);
        $this->call(PartnerViewTableSeeder::class);
        $this->call(TasktodoTableSeeder::class);
        $this->call(PartnerTableSeeder::class);
        $this->call(PartnerNoteTableSeeder::class);
        $this->call(CustomerNoteTableSeeder::class);
        $this->call(PartnerTaskToDoSeederTable::class);
        $this->call(CustomerTaskToDoTableSeeder::class);

    }
}
