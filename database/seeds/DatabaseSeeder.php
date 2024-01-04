<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(WorkAreaTableSeeder::class);
        $this->call(WorkDivisionTableSeeder::class);
        $this->call(WorkTypeTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        
        Model::reguard();
    }
}
