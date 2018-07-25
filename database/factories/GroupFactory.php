<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Group::class, function (Faker $faker) {
    $name = $faker->word;
    return [
      'owner_id' => function () { return factory(App\User::class)->create()->id; },
      'name' => $faker->word,
      'slug' => str_slug($name),
    ];
});
