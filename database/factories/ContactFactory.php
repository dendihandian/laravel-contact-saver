<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Contact::class, function (Faker $faker) {
    return [
      'owner_id' => function () { return factory(App\User::class)->create()->id; },
      'group_id' => null,
      'first_name' => $faker->firstName,
      'middle_name' => null,
      'last_name' => $faker->lastName,
      'email' => $faker->safeEmail,
      'phone' => $faker->phoneNumber,
      'address' => $faker->address,
    ];
});
