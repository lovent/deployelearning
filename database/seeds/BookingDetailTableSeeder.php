<?php

use Illuminate\Database\Seeder;

class BookingDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\BookingDetail::class , 20)->create();
    }
}
