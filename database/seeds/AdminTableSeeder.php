<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert
        (
            array
            (
                array('id' => '1','name' => 'Admin','password'=>'admin@123','email'=>'admin@gmail.com'),
            )
        );
    }
}
