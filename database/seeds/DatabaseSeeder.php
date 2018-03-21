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
        $this->call(SchoolTableSeeder::class);
    	$this->call(TeacherTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LophocTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        $this->call(BookingDetailTableSeeder::class);
        $this->call(RateTableSeeder::class);
    }
}
