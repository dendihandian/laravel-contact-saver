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
        factory(App\Models\Group::class, 1)->create(['name' => 'Families', 'slug' => 'families', 'owner_id' => null]);
        factory(App\Models\Group::class, 1)->create(['name' => 'Friends', 'slug' => 'friends', 'owner_id' => null]);
        factory(App\Models\Group::class, 1)->create(['name' => 'Other', 'slug' => 'other', 'owner_id' => null]);
    }
}
