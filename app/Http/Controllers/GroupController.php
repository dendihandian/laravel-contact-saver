<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Contact;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $group = Group::whereIn('id', Group::DEFAULT_GROUP_ID_ARRAY)
        //   ->orWhere('owner_id', auth()->user()->id)
        //   ->first();

        return redirect()->route('groups.show', 1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $groups = Group::whereIn('id', Group::DEFAULT_GROUP_ID_ARRAY)
            ->orWhere('owner_id', auth()->user()->id)
            ->get();

        $contacts = Contact::where('group_id', $group->id)->get();

        $currentGroup = $group;

        return view('groups.show', compact('currentGroup', 'groups', 'contacts'));
    }
}
