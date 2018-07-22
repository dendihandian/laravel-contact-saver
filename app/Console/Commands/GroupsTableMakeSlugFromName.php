<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Group;
use DB;

class GroupsTableMakeSlugFromName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'groups:make-slug-from-name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make slug for each record of group table from their name.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // get all group
        $groups = Group::all();

        try {
            // perform db transaction
            DB::beginTransaction();

            // loop the groups
            $count = 0;
            foreach ($groups as $group) {
                $group->slug = str_slug($group->name);
                $group->save();
                $count++;
            }

            // commit changes
            DB::commit();

            // show info to console
            $this->info("{$count} groups slug was updated.");

        } catch (\Exception $e) {
            DB::rollback();

            // show error to console
            $this->error($e->getMessage());
        }

        /* php artisan groups:make-slug-from-name */
    }
}
