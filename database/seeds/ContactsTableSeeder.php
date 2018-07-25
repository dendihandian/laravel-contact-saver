<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Contact::class, 1)->create([
          'owner_id' => 1,
          'group_id' => \App\Models\Group::FAMILIES_GROUP_ID,
          'first_name' => 'Alfred',
          'last_name' => 'Pennyworth',
          'email' => 'pennyworth@wayne-enterprises.com',
        ]);

        factory(App\Models\Contact::class, 1)->create([
          'owner_id' => 1,
          'group_id' => \App\Models\Group::FRIENDS_GROUP_ID,
          'first_name' => 'Jim',
          'last_name' => 'Gordon',
          'email' => 'gordon@gcpd.org',
        ]);
    }
}
