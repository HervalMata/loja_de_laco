<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            [
                'id' => 1, 'name' => 'admin', 'type' => 'admin', 'mobile' => '99999999999', 'email' => 'admin@loja.com',
                'password' => '$2y$10$0zIJrE8CvWcVJ.M1UkKZNOYxikYdfIxavMEfu/rfaqWbyAuFgGcga', 'image' => '', 'status' => 1, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2, 'name' => 'subadmin', 'type' => 'subadmin', 'mobile' => '999999999998', 'email' => 'subadmin@loja.com',
                'password' => '$2y$10$0zIJrE8CvWcVJ.M1UkKZNOYxikYdfIxavMEfu/rfaqWbyAuFgGcga', 'image' => '', 'status' => 1, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('admins')->insert($adminRecords);
        /*foreach ($adminRecords as $key => $record) {
            Admin::create($record);
        }*/
    }
}
