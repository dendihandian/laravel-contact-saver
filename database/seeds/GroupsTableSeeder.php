<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Group::class, 1)->create(['name' => 'Families']);
        factory(App\Models\Group::class, 1)->create(['name' => 'Friends']);
        factory(App\Models\Group::class, 1)->create(['name' => 'Other']);
    }
}
