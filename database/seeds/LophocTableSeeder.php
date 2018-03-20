<?php

use Illuminate\Database\Seeder;

class LophocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Lophoc::class, 10)->create();
    }
}
