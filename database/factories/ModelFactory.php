<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\School::class , function (Faker $faker) {
        return[
                'school_name' => 'THPT '.$faker->name,
                'description' => $faker->paragraph,
                'city' => $faker->name,
        ];
});

$factory->define(App\Models\Teacher::class, function (Faker $faker) {
        static $password;
	return[
		'teacher_name' => $faker->name,
		'email' => $faker->unique()->email,
                'avatar_url'=> $faker->randomElement($array = array('man1.jpg', 'man2.jpg', 'man3.jpg', 'man4.jpg', 'man5.jpg', 'man6.jpg', 'man7.jpg', 'man8.jpg')),
		'gender' => $faker->numberBetween(1,2),
		'graduated_at' => $faker->address,
		'experience' => $faker->numberBetween(1,30),
		'school_id' => function () {
                    return factory(App\Models\School::class)->create()->id;
                },
                'subject' => $faker->numberBetween(1,8),	
	];
});

// $factory->define(App\Models\Slide::class , function (Faker $faker) {
//         return[
//                 'image_url' => $faker->name,
//                 'status' => '1',
//         ];
// });

$factory->define(App\User::class , function (Faker $faker) {
        return[
                'user_name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('secret'),
                'active' => $faker->numberBetween(0,1),
                'gender' => $faker->numberBetween(1,2),
                'address'=> $faker->address,
                'phone_number'=> $faker->phonenumber,
                'school_id' => function () {
                    return factory(App\Models\School::class)->create()->id;
                },
        ];
});

$factory->define(App\Models\Lophoc::class , function (Faker $faker) {
        return[
                'lophoc_name' => $faker->name,
                'begin_at' => $faker->datetime(),
                'price' => $faker->randomElement($array = array(5000000 , 10000000 , 7500000, 8500000)),
                'teacher_id' => function () {
                    return factory(App\Models\Teacher::class)->create()->id;
                },
                'status' => $faker->randomElement($array = array(1 , 2 , 3)),
        ];
});

$factory->define(App\Models\Booking::class , function (Faker $faker) {
        return[
                'status' => $faker->randomElement($array = array(0,1)),
                'user_id' => function () {
                    return factory(App\User::class)->create()->id;
                },
        ];
});

$factory->define(App\Models\BookingDetail::class, function (Faker $faker) {
        return [
                'booking_id'=> function () {
                    return factory(App\Models\Booking::class)->create()->id;
                },
                'lophoc_id'=> function () {
                    return factory(App\Models\Lophoc::class)->create()->id;
                },
        ];
});


$factory->define(App\Models\Rate::class , function (Faker $faker) {
        return[
                'point' => $faker->numberBetween(1,10),
                'content' => $faker->sentence,
                'user_id' => $faker->numberBetween(1,15),
                'lophoc_id' => $faker->numberBetween(1,10),
        ];
});

// $factory->define(App\Models\News::class , function (Faker $faker) {
//         return[
//                 'title' => $faker->text(10),
//                 'content' => $faker->text(40),
//         ];
// });
