<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'fullname' => 'Nora',
            'gender' => 1, //man
            'email' => 'admin@gmail.com',
            'phone' => '01667998642',
            "password" => bcrypt("123456"),
            'address' => 'Ha Dong, Ha Noi, Viet Nam',
            'position' => 1, //1 => admin , 2 => member
            'birthday' => '1998/01/30',
            'comment' => 'Developer at 3F Group',
            'status' => 1, // 0 => hidden , 1 => display , 2 => Not Actived
            'status_active' => 1, // 1 => not in recycle , 0 => in recycle
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'member',
            'fullname' => 'Duc',
            'gender' => 0, //women
            'email' => 'member@gmail.com',
            'phone' => '01667998642',
            "password" => bcrypt("123456"),
            'address' => 'Ha Dong, Ha Noi, Viet Nam',
            'position' => 2, //1 => admin , 2 => member
            'birthday' => '1998/01/30',
            'comment' => 'Developer at 3F Group',
            'status' => 0, // 0 => hidden , 1 => display , 2 => Not Actived
            'status_active' => 1, // 1 => not in recycle , 0 => in recycle
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
